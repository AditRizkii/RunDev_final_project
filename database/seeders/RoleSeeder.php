<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'mahasiswa']);
        Role::create(['name' => 'HMIF'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-hmif', 'delete-post-hmif']);
        Role::create(['name' => 'HMMI'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-hmmi', 'delete-post-hmmi']);
        Role::create(['name' => 'HMB'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-hmb', 'delete-post-hmb']);
        Role::create(['name' => 'HIMASTA'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-himasta', 'delete-post-himasta']);
        Role::create(['name' => 'HIMAFAR'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-himafar', 'delete-post-himafar']);
        Role::create(['name' => 'HIMAFIS'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-himafis', 'delete-post-himafis']);
        Role::create(['name' => 'HIMATIKA'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-himatika', 'delete-post-himatika']);
        Role::create(['name' => 'BEM-FMIPA'])->givePermissionTo(['kirim-surat', 'create-post', 'edit-post-bem-fmipa', 'delete-post-bem-fmipa']);
    }
}
