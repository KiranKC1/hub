<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class OpportunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Opportunitie');
        $path = public_path('hub-images/opportunities-images/');   
        for($i=1;$i<=50;$i++)
        {
        $title = $faker->sentence;
        $slug = Str::slug($title);
        DB::table('opportunities')->insert([
            'title' => $title,
            'description' => implode($faker->paragraphs(5)),
            'category_id' => rand(1,16),
            'date'=>\Carbon\Carbon::now()->addWeeks(rand(1,20)),
            'organization' =>  'Leap Frog Technologies',
            'featured_image' => $faker->image($path,750,500, null,false),
            'slug'=> $slug,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),
            'contact_details' => '+9779840055457',
            'email' => 'something@something.com',
            'location'=>'Patan, Lalitpur',
            'link'=>'https://www.something.com'
        ]);
    }
    }
}
