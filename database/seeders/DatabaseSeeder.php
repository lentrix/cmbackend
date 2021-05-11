<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Benjie Lenteria',
            'email' => 'benjie@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);
    }
}
