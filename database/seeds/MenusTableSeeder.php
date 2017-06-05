<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'item_name' => 'index',
            'panel_name' => 'admin',
            'href' => '/admin/articles',
			'text' => 'Главная',
        ]);
		
		DB::table('menus')->insert([
            'item_name' => 'add_article',
            'panel_name' => 'admin',
            'href' => '/admin/articles/add',
			'text' => 'Добавить',
        ]);
		
		DB::table('menus')->insert([
            'item_name' => 'guestbook',
            'panel_name' => 'admin',
            'href' => '/admin/guestbook',
			'text' => 'Гостевая',
        ]);
		
		DB::table('menus')->insert([
            'item_name' => 'index',
            'panel_name' => 'public',
            'href' => '/articles',
			'text' => 'Главная',
        ]);
		
		DB::table('menus')->insert([
            'item_name' => 'guestbook',
            'panel_name' => 'public',
            'href' => '/guestbook',
			'text' => 'Гостевая',
        ]);
    }
}
