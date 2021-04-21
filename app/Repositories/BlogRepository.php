<?php

namespace App\Repositories;

use App\Blog;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageMethods;
use Illuminate\Support\Str;
use Storage;


class BlogRepository {

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

        // $data["published_date"] = date('Y-m-d',strtotime($data["published_date"]));
        $data["visible"] = isset($data["visible"]);
        $model = Blog::updateOrCreate(['id' => $id],$data);

        if(isset($file)) {
            // @list($type, $file) = explode(';', $file);
            // @list(, $file) = explode(',', $file);
            // if($file) {
            //     $file = base64_decode($file);
                $this->manageImgs($model,$file,'portrait_image','public','blog');
            // }
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

        $objs = Blog::select(
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
        
        return Blog::select($select)
                    ->with($with)
                    ->whereId($id)
                    ->when($avoid_visible, static function($query) {
                        $query->where('visible',1);
                    })
                    ->when($author, static function($query) {
                        $query->where('user_id',auth()->user()->id);
                    })
                    ->first();
    }

    public function getLatestPosts($quantity = 2,$select = '*',$with = [],$filters = [])
	{
        return Blog::selectRaw($select)
                    ->where('visible',1)
                    ->with($with)
                    ->when(isset($filters['without_id']), static function($query) use ($filters) {
                        $query->where('id','!=',$filters["without_id"]);
                    })
                    ->orderBy('published_date','desc')
                    ->limit($quantity)
                    ->get();
    }

	public function delete($id)
	{
		return Blog::destroy($id);
    }

    public function getListPaginated($filters,$results_length)
    {
        
        $objs = Blog::select('*')
                    ->with([
                        'user' => static function($query) {
                            $query->select('id','name');
                        }
                    ])
                    ->when(isset($filters["user_id"]), static function($query) use ($filters) {
                        $query->where('user_id',$filters["user_id"]);
                    })
                    ->when(isset($filters["visible"]), static function($query) use ($filters) {
                        $query->where('visible',$filters["visible"]);
                    })
                    ->when(isset($filters["title"]), static function($query) use ($filters) {
                        $query->where('title','like',"%". $filters["title"] . "%");
                    })
                    ->paginate($results_length);
                
        
        $objs->map(function($item,$i) {
            $item->portrait_image = Storage::disk('public')->url($item->portrait_image);
            $item->published_date = date('M d, Y',strtotime($item->published_date));
            // $item->href = route('post.update',['id' => $item->id]);
            // $item->href_view = route('posts.detail',['id' => $item->id, 'title' => Str::slug($item->title)]);
            return $item;
        });

        $response =[
            'data' => $objs->items(),
            'pagination' => [
                'total' =>          $objs->total(),
                'current_page' =>   $objs->currentPage(),
                'per_page' =>       $objs->perPage(),
                'last_page' =>      $objs->lastPage(),
                'from' =>           $objs->firstItem(),
                'to' =>             $objs->lastPage(),
            ],
        ];

        return $response;
    }
   
}