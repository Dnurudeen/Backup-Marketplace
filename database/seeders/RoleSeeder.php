<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the role 'user' already exists
        if (!Role::where('name', 'user')->exists()) {
            Role::create(['name' => 'user', 'guard_name' => 'web']);
        }

        // Check if the role 'admin' already exists
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }

        // Check if the role 'admin' already exists
        if (!Role::where('name', 'seller')->exists()) {
            Role::create(['name' => 'seller', 'guard_name' => 'web']);
        }

        // Add more roles if needed and ensure uniqueness
        // Role::create(['name' => 'user']);
        // Role::create(['name' => 'seller']);
        // Role::create(['name' => 'admin']);
    }
}
