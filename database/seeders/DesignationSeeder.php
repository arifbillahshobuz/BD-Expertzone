<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Designation::insert([
    ['title' => 'Admin User'],
    ['title' => 'Regular User'],
    ['title' => 'Project Manager'],
    ['title' => 'Team Lead'],
    ['title' => 'Software Engineer'],
    ['title' => 'Frontend Developer'],
    ['title' => 'Backend Developer'],
    ['title' => 'UI/UX Designer'],
    ['title' => 'QA Tester'],
    ['title' => 'HR Manager'],
]);
    }
}
