<?php

namespace App\Repositories;

use App\EnterpriseImage;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageMethods;

class EnterpriseImageRepository {

    use ImageMethods;

	public function createUpdate($data) 
	{
        $id = isset($data["id"]) ? $data["id"] : NULL;

        if(isset($data['file']))
        {
            $file = $data['file'];
            unset($data['file']);
        }

        $model = EnterpriseImage::updateOrCreate(['id' => $id],$data);

        if( isset($file) ) {
            $this->manageImgs($model,$file,'url_image','public','empresas_imagenes');
        }

        return $model;
    }
    
    public function find($id,$select = '*')
	{
        return EnterpriseImage::whereId($id)
                    ->select($select)
                    ->first();
    }

	public function delete($id)
	{
		return EnterpriseImage::destroy($id);
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

        $objs = EnterpriseImage::select(
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