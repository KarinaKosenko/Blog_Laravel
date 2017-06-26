<?php

use Illuminate\Database\Seeder;

class PrivilegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege')->insert([
            'description' => 'to_add_blog_articles',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_edit_blog_articles',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_delete_blog_articles',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_add_blog_comments',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_edit_blog_comments',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_delete_blog_comments',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_add_guestbook_messages',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_edit_guestbook_messages',
        ]);

        DB::table('privilege')->insert([
            'description' => 'to_delete_guestbook_messages',
        ]);
    }
}
