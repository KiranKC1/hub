<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Event');
        $path = public_path('hub-images/events-images/');  
        for($i=1;$i<=20;$i++)
        {
        $title = $faker->sentence;
        $slug = Str::slug($title);
        DB::table('events')->insert([
            'title' => $title,
            'description' => implode($faker->paragraphs(5)),
            'featured_image' => $faker->image($path,750,500, null,false),
            'event_date'=>\Carbon\Carbon::today()->addWeeks(rand(1,20)),
            'start_time' =>  '01:00',
            'end_time' => '16:00',
            'slug'=> $slug,
            'venue' => 'Incube Playground',
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()
        ]);
    }
    }
}
