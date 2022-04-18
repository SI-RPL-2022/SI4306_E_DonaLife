<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'nama' => 'Administrator',
                'email' => 'admin@mail.com',
                'telepon' => '08128878678',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'nama' => 'Donatur',
                'email' => 'donatur@mail.com',
                'telepon' => '087888789878',
                'role' => 'donatur',
                'password' => Hash::make('password'),
            ]
        );
        foreach($data AS $d){
            User::create([
                'nama' => $d['nama'],
                'email' => $d['email'],
                'telepon' => $d['telepon'],
                'role' => $d['role'],
                'password' => $d['password'],

            ]);
        }
    }
}
