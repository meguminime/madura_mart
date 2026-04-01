<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Owner',
            'email' => 'maduramart@owner.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'owner',
            'alamat' => 'Jalan Raya Madura No. 1',
            'no_telepon' => '081234567890',
            'foto' => 'owner.jpg',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'maduramart@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'alamat' => 'Jalan Admin No. 2',
            'no_telepon' => '081234567891',
            'foto' => 'admin.jpg',
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'maduramart@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'customer',
            'alamat' => 'Jalan Pelanggan No. 3',
            'no_telepon' => '081234567892',
            'foto' => 'customer.jpg',
        ]);

        User::create([
            'name' => 'Courier',
            'email' => 'maduramart@courier.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'courier',
            'alamat' => 'Jalan Kurir No. 4',
            'no_telepon' => '081234567893',
            'foto' => 'courier.jpg',
        ]);

        $this->call(ProductSeeder::class);
    }
}
