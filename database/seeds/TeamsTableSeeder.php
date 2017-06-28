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
        try {
            \App\Models\Team::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            //
        }
    }
}
