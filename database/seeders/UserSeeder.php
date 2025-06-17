<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'email' => 'developer@gmail.com',
            ],
            [
                'name' => 'Developer',
                'password' => bcrypt('admin123'),
                'type' => 'superadmin',
            ]
        );
    }
}
