<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
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
        \App\Models\Tag::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'root',
//             'email' => 'test@example.com',
//             'password' => Hash::make('root'),
//             'role' => 'admin'
//         ]);
//
//        \App\Models\User::factory()->create([
//            'name' => 'user',
//            'email' => 'user@example.com',
//            'password' => Hash::make('user'),
//        ]);
//
//        Contact::factory()->create([
//            'phone' => '+3808001234567',
//            'address' => "84000 Kiev Russian Battleship st. 15",
//            'email' => 'example@company.mail',
//
//        ]);
    }
}
