<?php

 
use Illuminate\Database\Seeder;
class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professions')->insert([
            'name' => Str::random(10), 
        ]);
     }
}
