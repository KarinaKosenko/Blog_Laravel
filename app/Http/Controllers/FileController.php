<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;


class FileController extends Controller
{
    public function download($pathToFile)
    {
        $uploadModel = Upload::where('path', $pathToFile)->firstOrFail();
        $file = str_replace('.', '/', $pathToFile);
        $filePath = config('blog.uploadPath') . config('blog.defaultUploadSection') . '/' . $file;

        return response()->download($filePath, $uploadModel->oldname);
    }

    public function get($pathToFile)
    {
        $uploadModel = Upload::where('path', $pathToFile)->firstOrFail();
        $file = str_replace('.', '/', $pathToFile);
        $filePath = config('blog.uploadPath') . config('blog.defaultUploadSection') . '/' . $file;

        return response()->file($filePath);
    }
}
