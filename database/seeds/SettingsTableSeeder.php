<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'setting_key' => 'web_title',
            'setting_value' => 'OMG! CMS'
        ], [
            'setting_key' => 'web_description',
            'setting_value' => 'OMG! CMS - The PHP CMS built with Laravel 5.x'
        ], [
            'setting_key' => 'web_keywords',
            'setting_value' => 'hcomg, omgcms, cms, php cms, laravel'
        ], [
            'setting_key' => 'web_email',
            'setting_value' => 'admin@hcomg.com'
        ], [
            'setting_key' => 'web_timezone',
            'setting_value' => 'Asia/Ho_Chi_Minh'
        ]];
        try {
            \App\Models\Setting::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            //
        }
    }
}
