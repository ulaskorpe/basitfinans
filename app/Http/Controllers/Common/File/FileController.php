<?php

namespace App\Http\Controllers\Common\File;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;



class FileController extends Controller
{
    public function getFile(Request $request)
    {


        if ($request->h || $request->w) {

            $filename = storage_path($request->input("u"));
            $newFilename = $this->renameFile($filename, $request->w, $request->h, $request->a);
            $mime = \GuzzleHttp\Psr7\mimetype_from_filename($filename);

            if (!is_file($newFilename)) {

                if (empty($request->h)) {

                    Image::make($filename)->widen($request->w, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);

                } elseif (empty($request->w)) {

                    Image::make($filename)->heighten($request->h, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);

                } else {

                    Image::make($filename)->resize($request->w, $request->h, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);


                }
            }
        } else {

            $newFilename = storage_path($request->input("u"));
            //return $newFilename;
            $mime = \GuzzleHttp\Psr7\mimetype_from_filename($newFilename);
        }



        return response()->file($newFilename, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . $newFilename . '"',
            'Cache-Control' => 'public, max-age=604800'// 1 weeek
        ]);
    }
    public function getCommonFile(Request $request)
    {
        // dd($request);

        if ($request->h || $request->w) {

            $filename = public_path($request->input("u"));
            $newFilename = $this->renameFile($filename, $request->w, $request->h, $request->a);
            $mime = \GuzzleHttp\Psr7\mimetype_from_filename($filename);

            if (!is_file($newFilename)) {

                if (empty($request->h)) {

                    Image::make($filename)->widen($request->w, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);

                } elseif (empty($request->w)) {

                    Image::make($filename)->heighten($request->h, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);

                } else {

                    Image::make($filename)->resize($request->w, $request->h, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);


                }
            }
        } else {

            $newFilename = public_path($request->input("u"));
            //return $newFilename;
            $mime = \GuzzleHttp\Psr7\mimetype_from_filename($newFilename);
        }



        return response()->file($newFilename, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . $newFilename . '"',
            'Cache-Control' => 'public, max-age=604800'// 1 weeek
        ]);
    }
    private function renameFile($file, $width = 0, $height = 0, $aspect = 1)
    {

        $height = (!empty($height) && is_numeric($height) && $height > 0) ? $height : 'A';
        $width = (!empty($width) && is_numeric($width) && $width > 0) ? $width : 'A';

        $aspect = ($aspect) ? "aspected" : "no";
        $add = $width . "x" . $height . "_" . $aspect;

        $farray = explode('/', $file);
        $fileName = $farray[count($farray) - 1];

        $extArray = explode(".", $fileName);
        $ext = $extArray[count($extArray) - 1];

        $newFileName = "";
        for ($i = 0; $i < count($extArray) - 1; $i++) {
            $newFileName .= $extArray[$i];
        }
        $newFileName = $newFileName . "_" . $add . "." . $ext;
        return str_replace($fileName, $newFileName, $file);

    }
}
