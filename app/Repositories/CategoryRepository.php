<?php

namespace App\Repositories;

use App\Category;
use Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository {

	public function createUpdate($data) 
	{
        $id = isset($data["id"]) ? $data["id"] : NULL;
        $model = Category::updateOrCreate(['id' => $id],$data);

        return $model;
    }
    
    public function find($id)
	{
		return Category::find($id);
    }

	public function delete($id)
	{
		return Category::destroy($id);
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

        $objs = Category::select(
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