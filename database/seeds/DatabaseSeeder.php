<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TeamsTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(UsersPermissionsTableSeeder::class);
         $this->call(TeamsPermissionsTableSeeder::class);
         $this->call(UsersTeamsTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
    }
}
