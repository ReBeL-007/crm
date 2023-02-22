<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => Str::random(10),
                'email_verified_at' => Carbon::now(),
                'isAdmin'   => 1
            ]
        ];

        User::insert($users);
    }
}
