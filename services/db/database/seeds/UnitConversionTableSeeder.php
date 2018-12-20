<?php

use Illuminate\Database\Seeder;

class UnitConversionTableSeeder extends Seeder
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
                'from_amount' => 0.25,
                'from_unit_id' => 2,
                'to_amount' => 1.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 0.50,
                'from_unit_id' => 2,
                'to_amount' => 2.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 3.00,
                'from_unit_id' => 2,
                'to_amount' => 1.00,
                'to_unit_id' => 1
            ],
            [
                'from_amount' => 3.00,
                'from_unit_id' => 2,
                'to_amount' => 0.50,
                'to_unit_id' => 7
            ],
            [
                'from_amount' => 3.00,
                'from_unit_id' => 2,
                'to_amount' => 15.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 1,
                'to_amount' => 0.50,
                'to_unit_id' => 7
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 1,
                'to_amount' => 15.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 0.50,
                'from_unit_id' => 7,
                'to_amount' => 15.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 2.00,
                'from_unit_id' => 1,
                'to_amount' => 1.00,
                'to_unit_id' => 7
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 4,
                'to_amount' => 8.00,
                'to_unit_id' => 7
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 4,
                'to_amount' => 240.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 8.00,
                'from_unit_id' => 7,
                'to_amount' => 240.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 9,
                'to_amount' => 2.00,
                'to_unit_id' => 4
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 9,
                'to_amount' => 16.00,
                'to_unit_id' => 7
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 9,
                'to_amount' => 480,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 7,
                'to_amount' => 30.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 3,
                'to_amount' => 4.00,
                'to_unit_id' => 4
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 4,
                'to_amount' => 32.00,
                'to_unit_id' => 7
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 3,
                'to_amount' => 960.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 10,
                'to_amount' => 30.00,
                'to_unit_id' => 8
            ],
            [
                'from_amount' => 4.00,
                'from_unit_id' => 10,
                'to_amount' => 0.25,
                'to_unit_id' => 5
            ],
            [
                'from_amount' => 4.00,
                'from_unit_id' => 10,
                'to_amount' => 120.00,
                'to_unit_id' => 8
            ],
            [
                'from_amount' => 8.00,
                'from_unit_id' => 10,
                'to_amount' => 0.50,
                'to_unit_id' => 5
            ],
            [
                'from_amount' => 8.00,
                'from_unit_id' => 10,
                'to_amount' => 240.00,
                'to_unit_id' => 8
            ],
            [
                'from_amount' => 16.00,
                'from_unit_id' => 10,
                'to_amount' => 1.00,
                'to_unit_id' => 5
            ],
            [
                'from_amount' => 16.00,
                'from_unit_id' => 10,
                'to_amount' => 480.00,
                'to_unit_id' => 8
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 11,
                'to_amount' => 8.00,
                'to_unit_id' => 9
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 11,
                'to_amount' => 3785.00,
                'to_unit_id' => 6
            ],
            [
                'from_amount' => 1.00,
                'from_unit_id' => 11,
                'to_amount' => 128.00,
                'to_unit_id' => 7
            ]
        ]);
    }
}