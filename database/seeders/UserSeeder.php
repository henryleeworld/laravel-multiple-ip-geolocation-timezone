<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $users = [
            [
                'id'             => 1,
                'name'           => __('Admin'),
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'timezone'       => 'UTC',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
		    [
                'id'             => 2,
                'name'           => __('Henry Lee'),
                'email'          => 'henry@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'timezone'       => 'Asia/Taipei',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
		];
        User::insert($users);
    }
}