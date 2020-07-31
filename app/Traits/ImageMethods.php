<?php 

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait ImageMethods
{
    public function manageImgs($model,$file,$field,$directory,$folder){
        $c_name = $model->{$field};
        
        $filename = uniqid() . "-" . $field;
        $model->{$field} = $this->addFile($directory,$folder,$file,$filename,$c_name);
        $model->update();
    }

    public function manageImgs64($model,$file,$field,$directory,$folder){
        $c_name = $model->{$field};
        $ext = $this->getBase64Ext($file);
       
        $filename = uniqid() . "-" . $field;
        $model->{$field} = $this->addFile64($directory,$folder,$file,$filename,$c_name,$ext);
        $model->update();
    }

    public function addFile($disk,$name_folder,$file,$name,$last_name = null)
    {
        $ext = "." . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = $name_folder.'/'. Str::slug($this->clearString($name),"-") . $ext;

        if(Storage::disk($disk)->exists($filename))
        {
           $this->deleteFile($disk, $name_folder,$filename);
        }

        if(!is_null($last_name)) {
            if(Storage::disk($disk)->exists($last_name))
            {
               $this->deleteFile($disk, $name_folder,$last_name);
            }            
        }
        Storage::disk($disk)->put($filename, File::get($file));
        return $filename;
    }

    public function addFile64($disk,$name_folder,$file,$name,$last_name = null,$ext)
    {
        $filename = $name_folder.'/'. Str::slug($this->clearString($name),"-") . $ext;

        if(Storage::disk($disk)->exists($filename))
        {
           $this->deleteFile($disk, $name_folder,$filename);
        }

        if(!is_null($last_name)) {
            if(Storage::disk($disk)->exists($last_name))
            {
               $this->deleteFile($disk, $name_folder,$last_name);
            }            
        }
        Storage::disk($disk)->put($filename, $file);
        return $filename;
    }

    public function deleteFile($disk,$name_folder,$filename)
    {
        $ext = "." . pathinfo($filename, PATHINFO_EXTENSION);
        $now = Carbon::now();
        $now = str_replace(array(":"," "), "_" ,$now->toDateTimeString());

        $pos1 = strrpos($filename, '/');
        $pos2 = strrpos($filename, '.');
        $current_name = substr($filename,$pos1+1,$pos2);
        $pos2 = strrpos($current_name, '.');
        $current_name = substr($current_name,0,$pos2);
        $elem_name = $name_folder. '/deleted/'. $current_name ."_".$now.$ext;
        Storage::disk($disk)->move($filename,$elem_name);

        return $elem_name;
    }

    public function moveFile($last_name, $new_name, $disk, $name_folder)
    {
        $ext = "." . pathinfo($last_name, PATHINFO_EXTENSION);
        $c_name = $name_folder.'/'. Str::slug($this->clearString($new_name),"-") . $ext;

        Storage::disk($disk)->move($last_name,$c_name);
        return $c_name;
    }

    public function getBase64Ext($file)
    {
        $f = finfo_open();
        $result = finfo_buffer($f, $file, FILEINFO_MIME_TYPE);
        $result = explode('/',$result);
        $ext = ".".$result[1];

        return $ext;
    }

    public function clearString($string)
    {
        $string = trim($string);
 
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );
     
        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );
     
        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );
     
        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );
     
        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );
     
        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        $string = str_replace(
            array('+', '-', '(', ')'),
            array('-', '-', '-', '-',),
            $string
        );

        $string = str_replace(
            array('/'),
            array('-'),
            $string
        );
     
        // $string = str_replace(
        //     array("\", "¨", "º", "-", "~",
        //          "#", "@", "|", "!", """,
        //          "·", "$", "%", "&", "/",
        //          "(", ")", "?", "'", "¡",
        //          "¿", "[", "^", "<code>", "]",
        //          "+", "}", "{", "¨", "´",
        //          ">", "< ", ";", ",", ":",
        //          ".", " "),
        //     '',
        //     $string
        // );
     
     
        return $string;
    }
}   