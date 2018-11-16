<?php

use Illuminate\Database\Seeder;

class CatsTableFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cat::class, 5)->create();
    }
}
