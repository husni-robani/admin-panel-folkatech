<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@folkatech.com',
            'password' => 'password'
        ]);

        Company::create([
            'name' => 'Company1',
            'email' => 'company1@gmail.com',
            'link' => 'https://husnirb.tech'
        ]);

        Company::create([
            'name' => 'Company2',
            'email' => 'company2@gmail.com',
            'link' => 'https://husnirb.tech'
        ]);

        Company::create([
            'name' => 'Company3',
            'email' => 'company3@gmail.com',
            'link' => 'https://husnirb.tech'
        ]);
    }
}
