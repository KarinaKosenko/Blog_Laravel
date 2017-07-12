<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Classes\Uploader;
use App\Models\Upload;
use App\Models\Menu;


class ImageController extends Controller
{
    protected $menu;

    public function __construct()
    {
        $this->menu = Cache::tags(['menu', 'admin'])
            ->remember('menu', env('CACHE_TIME', 0), function () {
                return Menu::where('panel_name', 'admin')
                    ->get();
            });
    }

    public function upload(Uploader $uploader)
    {
        return view('layouts.single', [
            'page' => 'pages.admin.uploadImage',
            'title' => 'Uploading Image',
            'menu' => $this->menu,
        ]);
    }

    public function uploadPost(Request $request, Uploader $uploader, Upload $uploadModel, $article_id = null)
    {
        if ($uploader->validate($request, 'file', config ('imagerules') )) {
            $uploadedPath = $uploader->upload( config ('blog.imageUploadSection'));

            if ($uploadedPath !== false) {
                $uploadsModel = $uploader->register($uploadModel, $article_id);
                $uploadedProps = $uploader->getProps();
            }

            return $uploadedPath;
        }
        else {
            return implode($uploader->getErrors(), '<br>');
        }
    }
}
