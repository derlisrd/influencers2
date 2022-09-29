<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /* $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean("approved")->default(0); // 0 no 1 si
            $table->boolean('type')->default(0); */
        User::create([
            "name"=>"Administrador",
            "email"=>"admin@influencers2.com",
            "username"=>"admin",
            "password"=>Hash::make("admin1234"),
            "active"=>true,
            "type"=>1
        ]);
        // User::factory(10)->create();
    }
}
