<?php

namespace App\Repositories;

use App\Video;
use Illuminate\Support\Facades\DB;
use Storage;

class VideoRepository {


	public function createUpdate($data) 
	{
        $id = $data["id"];
        unset($data['id']);

        $model = Video::updateOrCreate(['id' => $id],$data);

        if(isset($file)) {
            $this->manageImgs($model,$file,'portrait_image','public','testimonial');
        }

        return $model;
    }
    
    public function getRecord()
	{
        
        return Video::select('*')->first();
    }

}