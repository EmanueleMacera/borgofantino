<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User;

class UserSeeder extends Seeder
{
    /**
     * Seeding the user.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => env('SUPER_USER_NAME'),
            'email' => env('SUPER_USER_EMAIL'),
            'password' => Hash::make(env('SUPER_USER_PSW')),
            'role' => env('SUPER_USER_ROLE'),
            'is_approved' => true,
        ]);
    }
}
