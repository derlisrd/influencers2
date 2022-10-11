<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "name"=>"Administrador",
            "email"=>"admin@joinads.me",
            "username"=>"admin",
            "password"=> Hash::make('join123'),
            "active"=>true,
            "type"=>2
        ]);
        User::create([
            "name"=>"Empresario",
            "email"=>"empresario@joinads.me",
            "username"=>"empresario",
            "password"=> Hash::make('join123'),
            "active"=>true,
            "type"=>1
        ]);
        User::create([
            "name"=>"Influencer",
            "email"=>"influencer@joinads.me",
            "username"=>"influencer",
            "password"=> Hash::make('join123'),
            "active"=>true,
            "type"=>0
        ]);

    }
}
