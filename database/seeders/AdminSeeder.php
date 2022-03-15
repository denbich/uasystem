<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin1',
            'email' => 'administrator@wolontariat.rybnik.pl',
            'password' => Hash::make('password'),
            'firstname' => 'Denis',
            'lastname' => 'Bichler',
            'role' => 'admin',
            'telephone' => '530403181',
        ]);
    }
}
