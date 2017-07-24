<?php

use Illuminate\Database\Seeder;

class UsersTeamsTableSeeder extends Seeder
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
            'team_id' => 1
        ]];
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        try {
            DB::table('users_teams')->truncate();
            DB::table('users_teams')->insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error($exception->getMessage());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
