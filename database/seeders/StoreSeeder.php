<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::factory()->create([
            'name' => 'CoolMart360',
            'proprietor' => 'Jerson Simbajon',
            'address' => 'Muntinlupa city',
            'phone' => '-'
        ]);

        Store::factory(20)->create();
    }
}
