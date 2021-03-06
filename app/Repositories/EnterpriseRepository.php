<?php

namespace App\Repositories;

use App\Enterprise;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageMethods;

class EnterpriseRepository
{
    use ImageMethods;

    public function createUpdate($data)
    {
        $id = isset($data["id"]) ? $data["id"] : null;
        if (isset($data["extra_info"])) {
            $extra_info = json_decode($data["extra_info"]);
            if ($extra_info->address_object->formatted_address == '') {
                $data["address"] = $extra_info->address_object->route . " " . $extra_info->address_object->street_number . ", " . $extra_info->address_object->locality . ", " . $extra_info->address_object->country;
            } else {
                $data["address"] = $extra_info->address_object->formatted_address;
            }

            $data["address_object"] = $extra_info->address_object;
            $data["latitude"] = $extra_info->address_object->latitude;
            $data["longitude"] = $extra_info->address_object->longitude;

            $deleted_images = $extra_info->deleted_images;
            app('App\Repositories\EnterpriseImageRepository')->delete($deleted_images);

            unset($data["extra_info"]);
        }

        if (isset($data["files"])) {
            $files = $data["files"];
            unset($data["files"]);
        }

        if (isset($data["portrait_image"])) {
            $portrait_image = $data["portrait_image"];
            unset($data["portrait_image"]);
        }

        $model = Enterprise::updateOrCreate(['id' => $id], $data);

        if (isset($portrait_image)) {
            $this->manageImgs($model, $portrait_image, 'portrait_image', 'public', 'empresas');
        }

        if (isset($files) && count($files) > 0) {
            foreach ($files as $key => $image) {
                $image_data["enterprise_id"] = $model->id;
                $image_data["file"] = $image;
                app('App\Repositories\EnterpriseImageRepository')->createUpdate($image_data);
            }
            // $this->manageImgs($model,$portrait_image,'portrait_image','public','empresas');
        }

        return $model;
    }

    public function find($id, $select = '*', $with = [], $where = [])
    {
        return Enterprise::whereId($id)
                    ->select($select)
                    ->with($with)
                    ->where($where)
                    ->first();
    }

    public function delete($id)
    {
        return Enterprise::destroy($id);
    }

    public function list()
    {
        $meta = new \stdClass();
        $meta->draw = intval(request('draw'));

        $start = intval(request('start'));
        $length = intval(request('length'));
        $page = ($start / $length) + 1;
        $search_value = request('search.value');
        request()->replace(['page' => $page]);
        $factor = ($page - 1) * $length;
        $storageUrl = asset('storage');
        DB::statement(DB::raw('SET @row_number = '. $factor));
        DB::statement(DB::raw("SET @storage_url = '${storageUrl}'"));

        $objs = Enterprise::select(
            DB::raw('(@row_number:=@row_number + 1 ) AS n'),
            'id',
            'name',
            'website',
            'phone',
            'email',
            'details',
            DB::raw("CASE WHEN portrait_image IS NULL
                THEN ''
                ELSE
                CONCAT(@storage_url,'/', portrait_image)
                END as portrait")
        )
        ->with('memberships')
        ->orderBy('id', 'asc')
        ->paginate($length);

        $meta->recordsTotal = $objs->total();

        $objs->map(function ($item, $index) {
            return $this->defineEnterpriseStatus($item);
        });

        $response = [
            'draw' => $meta->draw,
            'recordsTotal' => $meta->recordsTotal,
            'recordsFiltered' => $meta->recordsTotal,
            'data' => $objs->items(),
        ];

        return $response;
    }

    public function listFrontend($user)
    {
        $meta = new \stdClass();
        $meta->draw = intval(request('draw'));

        $start = intval(request('start'));
        $length = intval(request('length'));
        $page = ($start / $length) + 1;

        request()->replace(['page' => $page]);
        $factor = ($page - 1) * $length;
        DB::statement(DB::raw('SET @row_number = '. $factor));

        $objs = Enterprise::select(
            DB::raw('(@row_number:=@row_number + 1 ) AS n'),
            'id',
            'category_id',
            'name',
            'website',
            'phone',
            'email',
            'details',
            'address',
            DB::raw("CASE WHEN portrait_image IS NULL
                THEN ''
                ELSE
                CONCAT(@storage_url,'/', portrait_image)
                END as portrait")
        )
        ->with('memberships', 'category')
        ->where('user_id', $user->id)
        ->orderBy('id', 'asc')
        ->paginate($length);

        $meta->recordsTotal = $objs->total();



        $objs->map(function ($item, $index) {
            $this->defineEnterpriseStatus($item);
            $item->editUrl = route('frontend.directory.update', ['enterprise_id' => $item->id]);
            return $item;
        });


        $response = [
            'draw' => $meta->draw,
            'recordsTotal' => $meta->recordsTotal,
            'recordsFiltered' => $meta->recordsTotal,
            'data' => $objs->items(),
        ];

        return $response;
    }

    public function defineEnterpriseStatus($enterprise)
    {
        $status = [
            "label" => '',
            "color" => ''
        ];

        if (count($enterprise->memberships) == 0) {
            $status["label"] = 'Payment pending';
            $status["color"] = 'warning';
        } elseif ($this->checkPaymentDate($enterprise)) {
            $status["label"] = 'Active';
            $status["color"] = 'success';
        } else {
            $status["label"] = 'Payment due';
            $status["color"] = 'danger';
        }


        $enterprise->status = $status;
        return $enterprise;
    }

    public function checkPaymentDate($enterprise)
    {
        $now = time();
        return count($enterprise->memberships->filter(static function ($item, $index) use ($now) {
            return strtotime($item->due_date) >= $now;
        })) > 0;
    }
}
