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
            'name'=>"doctor",
            'email'=>"thisis.doctor@vitalcareprod.com",
            'password'=>Hash::make("vitalcare@dev2022"),
        ]);

        $user->doctor()->create([

        ]);

        $user->assignRole('Doctor');

        $user= User::create([
            'name'=>"admin doctor",
            'email'=>"thisis.admindoctor@vitalcareprod.com",
            'password'=>Hash::make("vitalcare@dev2022"),
        ]);

        $user->doctor()->create([

        ]);

        $user->assignRole('Admin');
    }
}
