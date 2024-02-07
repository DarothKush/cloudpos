<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buyer
        User::create([
            'name'=>'buyer',
            'email'=>'buyer@gmail.com',
            'password'=>Hash::make('buyer123')
        ])->assignRole('buyer');
        //seller
        User::create([
            'name'=>'seller',
            'email'=>'seller@gmail.com',
            'password'=>Hash::make('seller123')
        ])->assignRole('seller');
    }
}
