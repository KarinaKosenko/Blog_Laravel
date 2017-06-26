<?php

use Illuminate\Database\Seeder;

class PrivilegeRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 9; $i++) {
            DB::table('privilege_role')->insert([
                'role_id' => 1,
                'privilege_id' => $i,
            ]);
        }

        for($k = 4; $k <= 9; $k++) {
            DB::table('privilege_role')->insert([
                'role_id' => 2,
                'privilege_id' => $k,
            ]);
        }

        DB::table('privilege_role')->insert([
            'role_id' => 3,
            'privilege_id' => 4,
        ]);

        DB::table('privilege_role')->insert([
            'role_id' => 3,
            'privilege_id' => 7,
        ]);
    }
}
