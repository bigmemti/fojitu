<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileAdditionController extends Controller
{
    public function download(File $file){
        return response()->download(storage_path('app/'.$file->path),$file->name);
    }

    public function image(File $file){

    }
}
