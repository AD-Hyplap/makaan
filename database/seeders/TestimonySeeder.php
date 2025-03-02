<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimony;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimony::factory()->count(10)->create();
    }
}
