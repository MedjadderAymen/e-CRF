<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
           'name'=>"medjadder aimen",
           'email'=>"aimen.medjadder@vitalcareprod.com",
           'password'=>Hash::make("password"),
        ]);

        $user->admin()->create([

        ]);

        $user->assignRole('Super Admin');
    }
}
