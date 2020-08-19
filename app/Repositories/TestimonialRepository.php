<?php

namespace App\Repositories;

use App\Testimonial;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageMethods;
use Illuminate\Support\Str;
use Storage;


class TestimonialRepository {

    use ImageMethods;

	public function createUpdate($data) 
	{
        $id = $data["id"];
        unset($data['id']);

        if(isset($data["portrait_image"]))
        {
            $file = $data["portrait_image"];
            unset($data["portrait_image"]);
        }

        $model = Testimonial::updateOrCreate(['id' => $id],$data);

        if(isset($file)) {
            $this->manageImgs($model,$file,'portrait_image','public','testimonial');
        }

        return $model;
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

        $objs = Testimonial::select(
                        DB::raw('(@row_number:=@row_number + 1 ) AS n'),
                        'id',
                        'title'
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
    
    public function find($id,$select = '*',$with = [],$avoid_visible = false,$author = false)
	{
        
        return Testimonial::select($select)
                    ->with($with)
                    ->whereId($id)
                    ->first();
    }

	public function delete($id)
	{
		return Testimonial::destroy($id);
    }
   
}