<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   User::create([
        'name' => 'TeacherSamaa',
        'email' => 'teacher123@gmail.com',
        'password' => Hash::make('123456'),
        'role'=> 'teacher',
       ]);
    }
}
