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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        try {
            \App\Models\SettingGroup::truncate();
            \App\Models\SettingGroup::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error($exception->getMessage());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
