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
        $this->call(AnimeSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(FansubSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EpisodeSeeder::class);
        $this->call(Comment_EpisodeSeeder::class);
        $this->call(Comment_AnimeSeeder::class);
    }
}