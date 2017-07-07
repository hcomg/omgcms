<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'locale' => 'en',
            'name' => 'English'
        ], [
            'locale' => 'vi',
            'name' => 'Tiếng Việt'
        ]];
        try {
            \App\Models\Language::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            //
        }
    }
}
