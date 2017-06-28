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
        try {
            \App\Models\Permission::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            //
        }
    }
}
