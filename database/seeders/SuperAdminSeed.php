<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'name'=>"super admin",
            'email'=>"thisis.superadmin@vitalcareprod.com",
            'password'=>Hash::make("vitalcare@dev2022"),
        ]);

        $user->admin()->create([

        ]);

        $user->assignRole('Super Admin');
    }
}
