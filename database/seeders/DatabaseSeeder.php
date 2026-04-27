<?php

/*
 * php artisan db:seed --class=UserSeeder
 * for all seeders: php artisan db:seed
 */

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PlantSeeder::class,
        ]);
    }
}
