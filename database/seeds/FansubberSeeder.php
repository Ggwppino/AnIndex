<?php

use App\Fansubber;
use Illuminate\Database\Seeder;

class FansubberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fansubber::class, 10)->create();
    }
}