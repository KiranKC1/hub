<?php

use Illuminate\Database\Seeder;

class OpportunitiesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opportunitiescategories')->insert([
            'name' => 'Accounting / Finance',
            'slug' => 'accounting-finance'
            ]);
            DB::table('opportunitiescategories')->insert([
                'name' => 'Commercial / Logistics / Supply Chain',
                'slug' => 'commercial-logistics-supplychain'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Human Resource /Org. Development',
            'slug' => 'humanresource-organizationdevelopment'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'General Mgmt. / Administration / Operations',
            'slug'=>'generalmanagement-administration-operations'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Marketing / Advertising / Customer Service',
            'slug'=>'marketing-advertising-customerservice'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Production / Maintenance / Quality',
            'slug' => 'production-maintenance,quality'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Secretarial / Front Office / Data Entry',
            'slug' => 'secretarial-frontoffice-dataentry'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Architecture / Interior Designing',
            'slug' => 'architecture-interior-designing'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Construction / Engineering / Architects',
            'slug' => 'construction-engineering-architects'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'IT & Telecommunication',
            'slug'=>'it-telecommunication'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'NGO / INGO / Social work',
            'slug' => 'ngo-ingo-socialwork'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Research and Development',
            'slug' => 'research-and-development'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Teaching / Education',
            'slug'=>'teaching-education'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Banking / Insurance / Financial Services',
            'slug'=>'banking-insurance-financialservices'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Creative / Graphics / Designing',
            'slug' => 'creative-graphics-designing'
        ]);
        DB::table('opportunitiescategories')->insert([
            'name' => 'Others',
            'slug' => 'others'
        ]);
    }
}
