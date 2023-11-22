<?php
namespace App\Services;

use App\Models\File;
use App\Models\Type;
use App\Helper\fileManager;

class FileService{

    use fileManager;

    public static function makeFiles(Array $uploaded_files, string $folder = ''){
        $files = [];
        foreach($uploaded_files as $file){
            $files[] = self::makeFile($file, $folder);
        }
        return collect($files);
    }

    public static function makeFile($file, string $folder = '', FileService $service  = new FileService()){
        [$file_path, $file_name, $file_mime, $file_size]= $service->upload($file,$folder);

        $file = File::create([
            'name' => $file_name,
            'path' => $file_path,
            'size'  => $file_size,
            'type_id' => Type::whereRelation('mimes', 'name', $file_mime)->first()->id,
        ]);

        return $file;
    }

    public static function deleteFile($path, FileService $service = new FileService()) {
        $service->delete($path);
    }
}
