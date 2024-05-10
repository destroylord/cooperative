<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::create([
           'name' => 'Admin User',
           'username' => 'admin',
           'email' => 'admin@example.com',
           'password' => Hash::make('password'),
           'email_verified_at' => now(),
           'place_of_birth' => 'Jakarta',
           'date_of_birth' => '1990-01-01',
           'address' => 'Jakarta',
           'gender' => 'L',
           'region' => 'Jakarta',
           'marital_status' => 'Menikah',
           'type_work' => 'Full Time',
           'citizenship' => 'Indonesia',
           'phone' => '081234567890',
           'nik' => '123456789012345',
           'created_at' => now(),
       ]);

       // Assign the "admin" role to the user
       $adminRole = Role::where('name', 'admin')->first();
       $user->assignRole($adminRole);

    }
}
