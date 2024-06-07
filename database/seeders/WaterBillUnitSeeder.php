<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaterBillUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('water_bill_units')->insert(
            [
                [
                    'fixed_charge' => 0,
                    'per_unit_charge' => 25,
                    'min_units' => 0,
                    'max_units' => 60,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'fixed_charge' => 400,
                    'per_unit_charge' => 30,
                    'min_units' => 61,
                    'max_units' => 90,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'fixed_charge' => 1000,
                    'per_unit_charge' => 50,
                    'min_units' => 91,
                    'max_units' => 120,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'fixed_charge' => 1500,
                    'per_unit_charge' => 50,
                    'min_units' => 121,
                    'max_units' => 180,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'fixed_charge' => 2000,
                    'per_unit_charge' => 75,
                    'min_units' => 181,
                    'max_units' => null,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
