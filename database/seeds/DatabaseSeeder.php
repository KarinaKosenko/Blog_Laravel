<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
		$this->call(MenusTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PrivilegeTableSeeder::class);
        $this->call(PrivilegeRoleTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(UploadsTableSeeder::class);
    }
}
