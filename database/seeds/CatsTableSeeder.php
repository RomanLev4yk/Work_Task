<?php

use Illuminate\Database\Seeder;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Cats')->insert([
            'name' => 'Murzik',
	        'age' => rand(1, 20),
	        'weight' => rand(1, 15),
	        'amount_of_legs' => 4
        ]);

        DB::table('Cats')->insert([
            'name' => 'Vasya',
	        'age' => rand(1, 20),
	        'weight' => rand(1, 15),
	        'amount_of_legs' => 4
        ]);

        DB::table('Cats')->insert([
            'name' => 'Asya',
	        'age' => rand(1, 20),
	        'weight' => rand(1, 15),
	        'amount_of_legs' => 4
        ]);

        DB::table('Cats')->insert([
            'name' => 'Denis',
	        'age' => rand(1, 20),
	        'weight' => rand(1, 15),
	        'amount_of_legs' => 3
        ]);
    }
}
