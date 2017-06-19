<?php

/**
 * Dynamic image resizer routes
 */

//http://laravel.local/image/resize/600/400/rwerwerwerwerwerwer.jpg

/**
 * Routes for image uploading
 */

Route::group(['middleware' => 'admin'], function() {

    Route::get('upload/{article_id?}', 'ImageController@upload')
        ->name('admin.image.upload');

    Route::post('upload/{article_id?}', 'ImageController@uploadPost')
        ->name('admin.image.uploadPost');
});


/**
 * Routes for image modification
 */

Route::get('resize/{width}/{height}/{path}','ImageController@resize')
    ->where([
        'width' => '\d+',
        'height' => '\d+',
        'path' => '[\w\.]+',
    ]);

Route::get('fit/{width}/{height}/{path}','ImageController@fit')
    ->where([
        'width' => '\d+',
        'height' => '\d+',
        'path' => '[\w\.]+',
    ]);

Route::get('widen/{width}/{path}','ImageController@widen')
    ->where([
        'width' => '\d+',
        'path' => '[\w\.]+',
    ]);

Route::get('heighten/{height}/{path}','ImageController@heighten')
    ->where([
        'height' => '\d+',
        'path' => '[\w\.]+',
    ]);

Route::get('show/{path}','ImageController@show')->where('path','[\w\.]+');
