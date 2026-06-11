<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' =>'Messi',
            'email' => 'leo10@gmail.com',
            'phone' => 9807639889,
            'address' => 'Rosario',
            'image' => '',
        ]);
    }
}
