<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'route_name' => 'admin.page_overview',
            'title' => 'Admin Overview Page'
        ]];
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        try {
            \App\Models\Permission::truncate();
            \App\Models\Permission::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error($exception->getMessage());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
