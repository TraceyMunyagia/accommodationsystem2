<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'admission_number'=>'150644',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number'=>'0786312121',
            'password'=> bcrypt('user1'),
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone_number'=>'0786312121',
            'password'=> bcrypt('admin1'),
        ]);
    }
}
