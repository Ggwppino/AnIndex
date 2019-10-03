<?php

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
        $this->call(FansubSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TargetSeeder::class);
        $this->call(AnimeSeeder::class);
        $this->call(FansubberSeeder::class);
        $this->call(EpisodeSeeder::class);
    }
}