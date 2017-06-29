<?php

use Illuminate\Database\Seeder;

class SettingGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'Generate',
            'sort_order' => 1
        ], [
            'name' => 'Themes',
            'sort_order' => 2
        ]];
        try {
            \App\Models\SettingGroup::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            //
        }
    }
}
