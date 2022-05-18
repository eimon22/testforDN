<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarItem;

class CarItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarItem::factory()->times(10)->create();
    }
}
