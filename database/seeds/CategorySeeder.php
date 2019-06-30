<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $faker = Faker::create('App\Post');
        $path = public_path('hub-images/categories-images/');   

        DB::table('categories')->insert([
            'name' => 'Career',
            'slug' => 'carrer',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Science',
            'slug'=>'science',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Sports',
            'slug' => 'sports',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
     
        DB::table('categories')->insert([
            'name' => 'Gaming',
            'slug' => 'gaming',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Nature',
            'slug' =>'nature',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Music',
            'slug'=>'music',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'DIY',
            'slug' =>'diy',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Political',
            'slug' => 'political',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Photography',
            'slug' => 'photography',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Technology',
            'slug'=>'technology',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Travel',
            'slug'=>'travel',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
        DB::table('categories')->insert([
            'name' => 'Food',
            'slug' => 'food',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
       
        DB::table('categories')->insert([
            'name' => 'Health',
            'slug' => 'health',
            'category_image' => $faker->image($path,750,500, null,false)
        ]);
    }
}
