<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'name' => 'admin1',
            'email' => 'admin1@admin.com',
            'password' => bcrypt('admin1admin'),
        ]);
    }
}
