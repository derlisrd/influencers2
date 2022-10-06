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
            "password"=> Hash::make( env('PASS_INITIAL') ),
            "active"=>true,
            "type"=>1
        ]);
    }
}
