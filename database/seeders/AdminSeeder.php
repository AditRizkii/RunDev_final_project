<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'npm' => '2108107010002',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole(['admin', 'mahasiswa', 'HMIF', 'HIMAFAR', 'HIMAFIS', 'HIMASTA', 'HMMI', 'HMB', 'BEM-FMIPA', 'HIMATIKA']);

        User::create([
            'name' => 'mahasiswa',
            'email' => 'mhs@gmail.com',
            'npm' => '2108107010003',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('mahasiswa');

        User::create([
            'name' => 'HMIF',
            'email' => 'HMIF@gmail.com',
            'npm' => '2108107010004',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('HMIF'); //

        User::create([
            'name' => 'HIMAFAR',
            'email' => 'HIMAFAR@gmail.com',
            'npm' => '2108109010005',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('HIMAFAR'); //

        User::create([
            'name' => 'HIMAFIS',
            'email' => 'HIMAFIS@gmail.com',
            'npm' => '2108102010006',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('HIMAFIS'); //

        User::create([
            'name' => 'HIMASTA',
            'email' => 'HIMASTA@gmail.com',
            'npm' => '2108108010007',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('HIMASTA'); //

        User::create([
            'name' => 'HIMATIKA',
            'email' => 'HIMATIKA@gmail.com',
            'npm' => '2108101010008',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('HIMATIKA');

        User::create([
            'name' => 'HMMI',
            'email' => 'HMMI@gmail.com',
            'npm' => '2108001010009',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('HMMI'); //

        User::create([
            'name' => 'HMB',
            'email' => 'HMB@gmail.com',
            'npm' => '2108104010010',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('HMB'); //

        User::create([
            'name' => 'BEM-FMIPA',
            'email' => 'BEMFMIPA@gmail.com',
            'npm' => '2108107010011',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole('BEM-FMIPA'); //
    }
}
