<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin   = Role::where('nama', 'admin')->first();
        $pembeli = Role::where('nama', 'pembeli')->first();

        $u1 = User::firstOrCreate(
            ['email' => 'admin@esgabin.test'],
            ['name' => 'Admin', 'password' => Hash::make('password123')]
        );
        UserRole::firstOrCreate(['user_id' => $u1->id], ['role_id' => $admin->id]);

        $u2 = User::firstOrCreate(
            ['email' => 'pembeli@esgabin.test'],
            ['name' => 'Pembeli', 'password' => Hash::make('password123')]
        );
        UserRole::firstOrCreate(['user_id' => $u2->id], ['role_id' => $pembeli->id]);
    }
}
