<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'role_as' => 1,
            'budget' => 0,
            'password' => '$2y$10$BI2FcfBL4dhhBYALp9qGG.IWwDxGPZvEddhyi22j0OcTob6KchGe2', // 12345678
            'remember_token' => Str::random(10),
        ]);
    }
}
