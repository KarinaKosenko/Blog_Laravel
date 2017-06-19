<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Uploader;
use App\Models\Upload;
use App\Models\Article;
use App\Models\Menu;
use Image;
use File;

class ImageController extends Controller
{
    protected $menu;

    public function __construct()
    {
        $this->menu = Menu::where('panel_name', 'admin')
            ->get();
    }

    public function upload(Uploader $uploader, $article_id = null)
    {
        return view('layouts.single', [
            'page' => 'pages.admin.uploadImage',
            'title' => 'Uploading Image',
            'menu' => $this->menu,
        ]);
    }

    public function uploadPost(Request $request, Uploader $uploader, Upload $uploadModel, $article_id = null)
    {
        $rules = [
            'maxSize' => 10 * 1024 * 1024,
            'minSize' => 10 * 1024,
            'allowedExt' => [
                'jpeg',
                'jpg',
                'png',
                'gif',
                'bmp',
                'tiff',
                'pdf'
            ],
            'allowedMime' => [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'application/pdf'
            ],
        ];

        if ($uploader->validate($request, 'file', $rules)) {
            $uploadedPath = $uploader->upload( config ('blog.imageUploadSection'));

            if ($uploadedPath !== false) {
                $uploadsModel = $uploader->register($uploadModel, $article_id);
                $uploadedProps = $uploader->getProps();
            }

            return $uploadedPath;
        }
        else {
            return implode($uploader->getErrors(), '<br>');
            //return $uploader->getErrors();
        }
    }

    public function resize($width, $height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $width, $height) {
            $image->make($imgFile)->resize($width, $height);
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function fit($width, $height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $width, $height) {
            $image->make($imgFile)->fit($width, $height, function ($constraint) {
                $constraint->upsize();
            });
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function widen($width, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $width) {
            $image->make($imgFile)->widen($width, function ($constraint) {
                $constraint->upsize();
            });
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function heighten($height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $height) {
            $image->make($imgFile)->heighten($height, function ($constraint) {
                $constraint->upsize();
            });
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function show($path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::make($imgFile);

        return $this->createResponse($img, $ext, 100);
    }

    protected function getImagePath($path)
    {
        $nameArray = explode('.', $path);
        $ext = array_pop($nameArray);
        $file = str_replace('.', '/', implode('.', $nameArray));
        //"5/5d8/5d8a1e5b371dd90c0b9064c6c859603d9e640994"
        $filePath = config('blog.uploadPath') . config('blog.imageUploadSection') . '/' . $file;

        if (!File::isFile($filePath)) {
            $filePath = config('blog.imageDefaultPath');
            $ext = 'jpg';
        }

        return [$filePath, $ext];
    }

    protected function createResponse($imgObj, $ext = 'jpg', $quality = 75)
    {
        return $imgObj->response($ext, $quality)
            ->header('Cache-Control', 'public, max-age=86400');
    }
}
