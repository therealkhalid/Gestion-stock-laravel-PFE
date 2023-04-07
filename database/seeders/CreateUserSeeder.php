<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name'=>'khalid',
            'email' => 'khalid@gmail.com',
            'password' => bcrypt('khalid123'),
            'role' => '0',
            'adress'=>'tiflet',
            'telephone'=>'+212766933356'
            ],
            
            
        ];
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
