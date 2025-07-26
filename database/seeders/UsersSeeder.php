<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdmin = User::create([
            'matricula' => '3522110167',
            'email' => '3522110167@uth.edu.mx',
            'password' => Hash::make('admin123'),
        ]);
        $userAdmin->assignRole('administrador');

        $userStudent = User::create([
            'matricula' => '3522110168',
            'email' => '3522110168@uth.edu.mx',
            'password' => Hash::make('student123'),
        ]);
        $userStudent->assignRole('estudiante');
    }
}
