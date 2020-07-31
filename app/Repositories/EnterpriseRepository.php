<?php

namespace App\Repositories;

use App\Enterprise;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageMethods;

class EnterpriseRepository {

    use ImageMethods;

	public function createUpdate($data) 
	{
        $id = isset($data["id"]) ? $data["id"] : NULL;
        if( isset($data["extra_info"]) )
        {
            $extra_info = json_decode($data["extra_info"]);
            if($extra_info->address_object->formatted_address == '') {
                $data["address"] = $extra_info->address_object->route . " " . $extra_info->address_object->street_number . ", " . $extra_info->address_object->locality . ", " . $extra_info->address_object->country;
            } else {
                $data["address"] = $extra_info->address_object->formatted_address;
            }
            
            $data["address_object"] = $extra_info->address_object;
            $data["latitude"] = $extra_info->address_object->latitude; 
            $data["longitude"] = $extra_info->address_object->longitude;
            unset($data["extra_info"]);
        }

        if( isset($data["files"]) ) 
        {
            $file = $data["files"][0];
            unset($data["files"]);
        }

        $model = Enterprise::updateOrCreate(['id' => $id],$data);

        if( isset($file) ) {
            $this->manageImgs($model,$file,'portrait_image','public','empresas');
        }

        return $model;
    }
    
    public function find($id,$select = '*')
	{
        return Enterprise::whereId($id)
                    ->select($select)
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
        $page = ( $start / $length ) + 1;
        $search_value = request('search.value');
        request()->replace(['page' => $page]);
        $factor = ( $page - 1 ) * $length;
        DB::statement(DB::raw('SET @row_number = '. $factor ));

        $objs = Enterprise::select(
                        DB::raw('(@row_number:=@row_number + 1 ) AS n'),
                        'id',
                        'name'
                    )
                    ->orderBy('id','asc')
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
    
    
}