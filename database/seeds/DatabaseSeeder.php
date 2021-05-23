<?php

use App\InterestProject;
use App\PlotSize;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(ProfessionSeeder::class);
        $this->call(InterestProjectSeeder::class);
        $this->call(PlotSizeSeeder::class);
        $this->call(ClientStatusSeeder::class);
        $this->call(SourceSeeder::class);
    }
}
