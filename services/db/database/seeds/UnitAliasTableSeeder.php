<?php

use Illuminate\Database\Seeder;

class UnitAliasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'unit_id' => 1,
                'alias' => 'tbsp'
            ],
            [
                'unit_id' => 2,
                'alias' => 'tsp'
            ],
            [
                'unit_id' => 3,
                'alias' => 'qt'
            ],
            [
                'unit_id' => 5,
                'alias' => 'lb'
            ],
            [
                'unit_id' => 6,
                'alias' => 'ml'
            ],
            [
                'unit_id' => 7,
                'alias' => 'fl oz'
            ],
            [
                'unit_id' => 8,
                'alias' => 'g'
            ],
            [
                'unit_id' => 9,
                'alias' => 'pt'
            ],
            [
                'unit_id' => 10,
                'alias' => 'oz'
            ],
            [
                'unit_id' => 11,
                'alias' => 'gal'
            ]
        ]);
    }
}