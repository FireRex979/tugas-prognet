<?php

namespace App\Models;

use Str;

class Mover
{
    public static function slugFile($file, $folder)
    {
        $image_name = strtolower(time().'_'.$file->getClientOriginalName());
        $image_name = Str::slug($image_name).'.'.strtolower($file->getClientOriginalExtension());
        $file->move(public_path($folder), $image_name);

        return $image_name;
    }

    public static function slugNameFile($file)
    {
        $filename = \Str::slug(strtolower($file->getClientOriginalName())) . '.' . strtolower($file->getClientOriginalExtension());
        return $filename;
    }

    public static function viewFile($path, $filename)
    {
        $extesion = explode('.', $filename);

        if (file_exists($path)) {
            if(is_file($path)) {
                if (is_readable($path)) {
                    if (count($extesion) > 1) {
                        if (last($extesion) == 'pdf' || last($extesion) == 'png' || last($extesion) == 'jpg' || last($extesion) == 'jpeg') {
                            return response()->file($path);
                        } else {
                            return response()->download(
                                $path,
                                \Str::slug($filename) . '.' . last($extesion)
                            );
                        }
                    } else {
                        return response()->download(
                            $path
                        );
                    }
                }
            }
        }

        return response('FILE_NOT_FOUND', 404);
    }

    public static function downloadFile($path, $filename)
    {
        $extesion = explode('.', $filename);
        if (file_exists($path)) {
            if(is_file($path)) {
                if (is_readable($path)) {
                    if (count($extesion) > 1) {
                        return response()->download(
                            $path,
                            \Str::slug($filename) . '.' . last($extesion)
                        );
                    } else {
                        return response()->download(
                            $path
                        );
                    }
                }
            }
        }

        return response('FILE_NOT_FOUND', 404);
    }

}
