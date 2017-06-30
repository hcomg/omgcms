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
            'setting_value' => 'OMG! CMS',
            'setting_type' => 'text',
            'setting_options' => '',
            'group_id' => 1,
            'sort_order' => 1,
        ], [
            'setting_key' => 'web_description',
            'setting_value' => 'OMG! CMS - The PHP CMS built with Laravel 5.x',
            'setting_type' => 'textarea',
            'setting_options' => '',
            'group_id' => 1,
            'sort_order' => 2,
        ], [
            'setting_key' => 'web_keywords',
            'setting_value' => 'hcomg, omgcms, cms, php cms, laravel',
            'setting_type' => 'textarea',
            'setting_options' => '',
            'group_id' => 1,
            'sort_order' => 3,
        ], [
            'setting_key' => 'web_email',
            'setting_value' => 'admin@hcomg.com',
            'setting_type' => 'email',
            'setting_options' => '',
            'group_id' => 1,
            'sort_order' => 4,
        ], [
            'setting_key' => 'web_timezone',
            'setting_value' => 'Asia/Ho_Chi_Minh',
            'setting_type' => 'select',
            'setting_options' => json_encode(['Asia/Ho_Chi_Minh', 'Asia/Seoul']),
            'group_id' => 1,
            'sort_order' => 5,
        ], [
            'setting_key' => 'web_theme',
            'setting_value' => 'freelancer',
            'setting_type' => 'select',
            'setting_options' => json_encode(['freelancer', 'creative']),
            'group_id' => 2,
            'sort_order' => 1,
        ]];
        try {
            \App\Models\Setting::insert($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::debug($exception->getMessage());
        }
    }
}
