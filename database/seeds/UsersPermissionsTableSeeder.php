<?php

use Illuminate\Database\Seeder;

class UsersPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'user_id' => 1,
            'permission_id' => 1
        ]];
        try {
            DB::table('users_permissions')->insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {

        }
    }
}
