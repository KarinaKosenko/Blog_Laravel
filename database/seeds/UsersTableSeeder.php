<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
            'is_admin' => 1,
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt(123456),
            'is_admin' => 1,
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Moder',
            'email' => 'moder@gmail.com',
            'password' => bcrypt(123456),
            'is_admin' => 0,
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456),
            'is_admin' => 0,
            'role_id' => 3,
        ]);

        DB::table('users')->insert([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt(123456),
            'is_admin' => 0,
            'role_id' => 3,
        ]);
    }
}
