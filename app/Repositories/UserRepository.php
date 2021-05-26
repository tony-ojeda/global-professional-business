<?php

namespace App\Repositories;

use App\Blog;
use Auth;
use Mail;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageMethods;
use App\User;
use App\Role;
use App\Mail\RecoverPassword;

class UserRepository
{
    use ImageMethods;

    public function create($data)
    {
        $role_id = Role::select('id')->where('name', 'Usuario')->first();

        unset($data["password_confirmation"]);
        $model = User::create($data);

        $model->roles()->sync($role_id->id);

        Auth::login($model, true);
        return $model;
    }

    public function updateData($id, $data)
    {
        if (isset($data["url_image"])) {
            $url_image = $data["url_image"];
            unset($data["url_image"]);
        }
        if (isset($data["url_image_changed"])) {
            unset($data["url_image_changed"]);
        }

        $model = User::find($id);
        $model->update($data);

        if (isset($url_image) && !is_bool(strpos($url_image, "base64"))) {
            @list($type, $url_image) = explode(';', $url_image);
            @list(, $url_image) = explode(',', $url_image);
            if ($url_image) {
                $file = base64_decode($url_image);
                $this->manageImgs64($model, $file, 'url_image', 'public', 'usuarios');
            }
        }

        return $model;
    }

    public function likePost($blog_id, $type)
    {
        if ($type == 1) {
            auth()->user()->blogs()->attach($blog_id);
        } else {
            auth()->user()->blogs()->detach($blog_id);
        }
    }

    public function likeComment($comment_id, $type)
    {
        if ($type == 1) {
            auth()->user()->comments()->attach($comment_id);
        } else {
            auth()->user()->comments()->detach($comment_id);
        }
    }

    public function createUpdate($data)
    {
        $id = $data["id"];
        $role_id = $data["role_id"];
        unset($data["id"]);
        unset($data["role_id"]);

        $model = User::updateOrCreate(['id' => $id], $data);
        $model->roles()->sync($role_id);

        return $model;
    }

    public function find($id, $select = '*', $with = [])
    {
        return User::whereId($id)
                    ->select($select)
                    ->with($with)
                    ->first();
    }

    public function delete($id)
    {
        return User::destroy($id);
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
        DB::statement(DB::raw('SET @row_number = '. $factor));

        $objs = User::select(
            DB::raw('(@row_number:=@row_number + 1 ) AS n'),
            'id',
            'name',
            'email'
        )
                    ->where('id', '!=', request()->user()->id)
                    ->whereHas('roles', static function ($query) {
                        $query->where('roles.id', '>', 1);
                    })
                    ->orderBy('id', 'asc')
                    ->paginate($length);
        
        $meta->recordsTotal = $objs->total();

        // $objs->map(static function($item,$index){
        //     return $item;
        // });

        $response = [
            'draw' => $meta->draw,
            'recordsTotal' => $meta->recordsTotal,
            'recordsFiltered' => $meta->recordsTotal,
            'data' => $objs->items(),
        ];
        
        return $response;
    }

    public function recoverPassword($email)
    {
        $model = User::whereEmail($email)
                    ->first();

        if (is_null($model)) {
            return null;
        }

        $new_password = $this->random_str(6);
        $model->password = $new_password;
        $model->update();

        try {
            Mail::to($email)
                ->send(new RecoverPassword($new_password));
        } catch (\Throwable $th) {
            // throw $th;
        }


        return $new_password;
    }
}
