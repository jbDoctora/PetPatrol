<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\PetInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Jillbert Doctora',
        //     'email' => 'doctorajillbert@gmail.com',
        //     'password' => 'password',
        //     'role' => '0',
        // ]);
        $user = User::factory()->create([
            'name' => 'John Smith',
            'email' => 'john@gmail.com',
        ]);

        PetInfo::factory(1)->create([
            'owner_id' => $user->id
        ]);
    }
}
