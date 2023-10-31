<?php
namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait fileManager {

    public function upload($file, $folder='', $disk = 'local')
    {
        if($file) {

            $path = Storage::disk($disk)->path($folder);

            !is_dir($path) && mkdir($path, 0777, true);

            $file_name   = time() . $file->getClientOriginalName();
            $file_path   = trim(str_replace(['\\','/'],DIRECTORY_SEPARATOR,$folder), DIRECTORY_SEPARATOR). DIRECTORY_SEPARATOR . $file_name;

            Storage::disk($disk)->put( $file_path, File::get($file));

            return [
                $file_path,
                $file->getClientOriginalName(),
                $file->getClientOriginalExtension(),
                Storage::size($file_path),
            ];
        }
    }

    public function delete($file_path, $disk = 'local')
    {
        Storage::disk($disk)->delete($file_path);
    }

    public function swap($old_file_path, $new_file, $old_disk = 'local', $folder = null, $new_disk = null)
    {
        $folder = $folder ?? $this->getFolder($old_file_path);

        $this->delete($old_file_path, $old_disk);

        return $this->upload($new_file, $new_disk ?? $old_disk , $folder);
    }

    public function getFolder($file_path) {
        $paths = explode(DIRECTORY_SEPARATOR,str_replace(['\\','/'],DIRECTORY_SEPARATOR,$file_path));

        array_pop($paths);

        $folder = implode(DIRECTORY_SEPARATOR,$paths);

        return $folder;
    }
}
