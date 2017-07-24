<?php

use Illuminate\Database\Seeder;

class TeamsPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'team_id' => 1,
            'permission_id' => 1
        ]];
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        try {
            DB::table('teams_permissions')->truncate();
            DB::table('teams_permissions')->insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error($exception->getMessage());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
