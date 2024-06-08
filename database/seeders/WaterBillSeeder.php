<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\WaterBill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaterBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $customers = Customer::all();

        foreach ($customers as $customer) {
            for ($i = 6; $i > 0; $i--) {
                $billNo = $customer->bill_no;
                WaterBill::factory()->create([
                    'bill_no' => $billNo,
                    'bill_date' => now()->addMonths($i),
                    'due_date' => now()->subMonths(1),
                    'user_id' => $customer->id,
                ]);
            }
        }
    }
}
