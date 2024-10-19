<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $sellerRole = Role::firstOrCreate(['name' => 'seller']);

        // Create Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'), // Always hash passwords
            'phone' => '081090987876',
        ]);

        // Create an Admin User
        // $admin = User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@mail.com',
        //     'password' => Hash::make('password'), // Make sure to use a secure password
        // ]);
        // Assign admin role
        $admin->assignRole($adminRole);

        // Create Seller
        $seller = User::create([
            'name' => 'Seller User',
            'email' => 'seller@mail.com',
            'password' => Hash::make('password'),
            'phone' => '09087654321',
        ]);

        // Create a Seller User
        // $seller = User::create([
        //     'name' => 'Seller User',
        //     'email' => 'seller@mail.com',
        //     'password' => Hash::make('password'), // Make sure to use a secure password
        // ]);
        // Assign seller role
        $seller->assignRole($sellerRole);
    }
}
