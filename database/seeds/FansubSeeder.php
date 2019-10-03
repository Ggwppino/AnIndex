<?php

use App\Fansub;
use Illuminate\Database\Seeder;

class FansubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fansub::class, 10)->create();
    }
}