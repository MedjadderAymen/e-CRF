<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class doctorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'name'=>"medjadder amar",
            'email'=>"amar.medjadder@vitalcareprod.com",
            'password'=>Hash::make("password"),
        ]);

        $user->doctor()->create([

        ]);

        $user->assignRole('Doctor');
    }
}
