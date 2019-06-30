<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Post');
        $path = public_path('hub-images/posts-images/');   
        for($i=1;$i<=20;$i++)
        {
        $title = $faker->sentence;
        $slug = Str::slug($title);
        DB::table('posts')->insert([
            'title' => $title,
            'category_id' => rand(1,13),
            'description' => implode($faker->paragraphs(5)),
            'author' => 'Kiran KC',
            'featured_image' => $faker->image($path,750,500, null,false),
            'slug'=> $slug,
            'featured' => false,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()
        ]);
    }
}
}
