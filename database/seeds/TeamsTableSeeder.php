<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'Team 1'
        ], [
            'name' => 'Team 2'
        ], [
            'name' => 'Team 3'
        ]];
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        try {
            \App\Models\Team::truncate();
            \App\Models\Team::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error($exception->getMessage());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
