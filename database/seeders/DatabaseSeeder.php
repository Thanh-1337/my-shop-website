<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gọi file ProductSeeder xử lý data ở trên hoạt động
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
