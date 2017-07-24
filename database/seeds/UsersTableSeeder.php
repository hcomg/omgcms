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
        $data = [[
            'name' => 'user_1',
            'email' => 'user_1@hcomg.com',
            'api_token' => bcrypt(rand(1,10)),
            'password' => bcrypt('123123')
        ], [
            'name' => 'user_2',
            'email' => 'user_2@hcomg.com',
            'api_token' => bcrypt(rand(1,10)),
            'password' => bcrypt('123123')
        ], [
            'name' => 'user_3',
            'email' => 'user_3@hcomg.com',
            'api_token' => bcrypt(rand(1,10)),
            'password' => bcrypt('123123')
        ]];
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        try {
            \App\Models\User::truncate();
            \App\Models\User::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error($exception->getMessage());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
