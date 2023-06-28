<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['name' => 'Артемий'],
            ['email' => 'muhammed1942ali@gmail.com', 'password' => '19421942', 'role_id' => User::ADMIN]
        );

        User::firstOrCreate(
            ['name' => 'Андрей'],
            ['email' => 'simple_user1@gmail.com', 'password' => 'user1942', 'role_id' => User::CLIENT]
        );

        User::firstOrCreate(
            ['name' => 'Владимир'],
            ['email' => 'simple_user2@gmail.com', 'password' => 'user1942', 'role_id' => User::CLIENT]
        );

        User::firstOrCreate(
            ['name' => 'Анна'],
            ['email' => 'simple_user3@gmail.com', 'password' => 'user1942', 'role_id' => User::CLIENT]
        );

        User::firstOrCreate(
            ['name' => 'Антон'],
            ['email' => 'simple_user4@gmail.com', 'password' => 'user1942', 'role_id' => User::CLIENT]
        );

        User::firstOrCreate(
            ['name' => 'Анастасия'],
            ['email' => 'lawyer_user1@gmail.com', 'password' => 'lawyer99', 'role_id' => User::LAWYER]
        );

        User::firstOrCreate(
            ['name' => 'Евгений'],
            ['email' => 'lawyer_user2@gmail.com', 'password' => 'lawyer99', 'role_id' => User::LAWYER]
        );
    }
}
