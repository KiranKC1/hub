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
        
        $this->call(AdminUserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(OpportunitiesCategorySeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(EventSeeder::class); 
       $this->call(OpportunitiesSeeder::class);
    }
}
