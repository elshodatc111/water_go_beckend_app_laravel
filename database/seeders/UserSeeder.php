<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{
    public function run(): void{
        User::truncate();
        $users = [
            [
                'name' => 'Admin Elshod',
                'phone' => '+998901111111',
                'email' => 'elshodatc1116@gmail.com',
                'type' => 'admin',
                'status' => 'true',
                'code' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Drektor Drektor',
                'phone' => '+998902222222',
                'email' => 'elshodatc@gmail.com',
                'type' => 'drektor',
                'status' => 'true',
                'code' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Currer User',
                'phone' => '+9989 8830450',
                'email' => 'emailcurrer@gmail.com',
                'type' => 'currer',
                'status' => 'true',
                'code' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'User Buyurtmachi',
                'phone' => '+998908830450',
                'email' => 'user1@example.com',
                'type' => 'user',
                'status' => 'pedding',
                'code' => null,
                'password' => Hash::make('password123'),
            ],
        ];
        foreach ($users as $data) {
            User::create($data);
        }
    }
}
