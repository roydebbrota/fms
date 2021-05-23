<?php

use Illuminate\Database\Seeder;

class PlotSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_sizes')->insert([
            'name' => Str::random(10), 
        ]);
    }
}
