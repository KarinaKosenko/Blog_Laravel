<?php

use Illuminate\Database\Seeder;

class UploadsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('uploads')->insert([
            'path' => '1.1a2.1a25f55930c10784f862613303809cf688b24a8d',
            'oldname' => 'Chrysanthemum.jpg',
            'size' => '879394',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '5.545.5459a6f4db25fd53b2d1d4660430cd0ac20b43f6',
            'oldname' => 'Desert.jpg',
            'size' => '845941',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '9.988.9880817d7b17b8983c8f30928851eb7c5ee0604d',
            'oldname' => 'Hydrangeas.jpg',
            'size' => '595284',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '6.609.609dcbece50cf4f0d63355d9d7fe4842e628b04c',
            'oldname' => 'Jellyfish.jpg',
            'size' => '775702',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '4.4bb.4bbb155ec5c04afe8c64d574e379a14dae834d40',
            'oldname' => 'Koala.jpg',
            'size' => '780831',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '8.8e9.8e9634846f28ec08892ed756ed6c576b6fdf7e15',
            'oldname' => 'Lighthouse.jpg',
            'size' => '561276',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => 'e.e62.e622962070821b324452aa858d5fc3c0dc849b66',
            'oldname' => 'Penguins.jpg',
            'size' => '777835',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '4.420.4204b2fd80f93b918a986207a72ef4b0ad99befe',
            'oldname' => 'Tulips.jpg',
            'size' => '620888',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '4.4c9.4c94eeb619635326e93b9526ba4c4736a69a42c7',
            'oldname' => 'Liner.jpg',
            'size' => '330776',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);

        DB::table('uploads')->insert([
            'path' => '2.239.239f6d9511d72b48791b41af1917b0690f7fc191',
            'oldname' => 'Nature.jpg',
            'size' => '371519',
            'ext' => 'jpg',
            'mime' => 'image/jpeg',
        ]);
    }
}
