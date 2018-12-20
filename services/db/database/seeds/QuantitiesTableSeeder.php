<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['name' => 'tablespoon'],
            ['name' => 'teaspoon'],
            ['name' => 'quart'],
            ['name' => 'cup'],
            ['name' => 'pound'],
            ['name' => 'milliliter'],
            ['name' => 'fluid ounce'],
            ['name' => 'gram'],
            ['name' => 'pint'],
            ['name' => 'ounce'],
            ['name' => 'gallon']
        ]);
    }
}