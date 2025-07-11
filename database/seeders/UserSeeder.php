<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'wahyu',
            'email' => 'wahyu@gmail.com',
            'role'  => '1',
            'password' => bcrypt('wahyu123')
        ]);
    }
}
