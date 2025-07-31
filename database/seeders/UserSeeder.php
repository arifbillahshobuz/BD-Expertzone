<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::disableQueryLog(); // গতি বাড়ানোর জন্য query log বন্ধ

       
        // Alternatively, you can create a specific user
        User::insert(
            [
                [
                    'name' => 'Admin User',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('password'),
                    'phone' => '1234567890',
                    'role' => 'admin'
                ],
                [
                    'name' => 'User',
                    'username' => 'user',
                    'email' => 'user@gmail.com',
                    'password' => bcrypt('password'),
                    'phone' => '0987654321',
                    'role' => 'user'
                ]
            ]
        );
        User::factory(500)->create();
    }
}
