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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        try {
            \App\Models\Language::truncate();
            \App\Models\Language::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error($exception->getMessage());
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
