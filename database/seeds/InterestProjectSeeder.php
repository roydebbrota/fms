<?php

use Illuminate\Database\Seeder;

class InterestProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interest_projects')->insert([
            'name' => Str::random(10), 
        ]);
    }
}
