<?php

namespace App\Repositories;

use App\Traits\ImageMethods;

class BlogImageRepository {

    use ImageMethods;

	public function saveImage($file)
	{
        $url_image = NULL;
        @list($type, $file) = explode(';', $file);
        @list(, $file) = explode(',', $file);
        if($file) {
            $file = base64_decode($file);
            $ext = $this->getBase64Ext($file);
            $filename = uniqid() . "-" . "blog-image";
            $url_image = $this->addFile64('public','blog_images',$file,$filename,NULL,$ext);
        }

        return $url_image;
    }

}