<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'timezone'       => 'UTC',
                'created_at'     => '2020-01-07 07:55:21',
                'updated_at'     => '2020-01-07 07:55:21',
            ],
		    [
                'id'             => 2,
                'name'           => 'Henry Lee',
                'email'          => 'henryleeworld@gmail.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
                'timezone'       => 'Asia/Taipei',
                'created_at'     => '2020-01-07 08:43:31',
                'updated_at'     => '2020-01-07 08:43:31',
            ],
		];

        User::insert($users);
    }
}