<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PhotoModel
{
    public function index(){
        $files = Storage::files('photos');
        $files = array_map( function ($file){
            return str_replace('.jpg','',str_replace('photos/','',$file));
        },$files);

        return $files;
    }

    public function store($file){
        $extension = $file->extension();
        if ($extension <> 'jpeg'){
            return  redirect('/');
        }
        $path = $file->storeAs('photos',$file->getClientOriginalName());
    }

    public function delete($file){
        $path= 'photos/'.$file.'.jpg';
        $exists = Storage::disk('local')->exists($path);
        if ($exists){
            Storage::delete($path);
        }
    }

    public function update($oldName,$newName){
        $oldPath= 'photos/'.$oldName.'.jpg';
        $exists = Storage::disk('local')->exists($oldPath);
        if ($exists){
            $newPath = 'photos/'.$newName.'.jpg';
            Storage::move($oldPath,$newPath);

        }
    }
}
