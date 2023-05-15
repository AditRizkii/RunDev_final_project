<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //edit-post-hmif
        Permission::create(['name' => 'create-post']);
        Permission::create(['name' => 'kirim-surat']);
        Permission::create(['name' => 'edit-post-hmif']);
        Permission::create(['name' => 'edit-post-hmmi']);
        Permission::create(['name' => 'edit-post-himafis']);
        Permission::create(['name' => 'edit-post-himafar']);
        Permission::create(['name' => 'edit-post-himasta']);
        Permission::create(['name' => 'edit-post-himatika']);
        Permission::create(['name' => 'edit-post-hmb']);
        Permission::create(['name' => 'edit-post-bem-fmipa']);
        Permission::create(['name' => 'delete-post-hmif']);
        Permission::create(['name' => 'delete-post-hmmi']);
        Permission::create(['name' => 'delete-post-himafis']);
        Permission::create(['name' => 'delete-post-himafar']);
        Permission::create(['name' => 'delete-post-himasta']);
        Permission::create(['name' => 'delete-post-himatika']);
        Permission::create(['name' => 'delete-post-hmb']);
        Permission::create(['name' => 'delete-post-bem-fmipa']);
    }
}
