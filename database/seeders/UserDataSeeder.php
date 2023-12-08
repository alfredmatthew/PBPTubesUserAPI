<?php

namespace Database\Seeders;

use App\Models\userData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(1)->sequence(
            ['name' => 'Matthew'],
        )->create();
    }
}
