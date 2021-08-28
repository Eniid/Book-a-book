<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'           => 'Enid',
            'email'          => 'enid-bc@hotmail.com',
            'group'          => '2384',
            'is_admin'       => '0',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
        ]);

        User::create([
            'name'           => 'Lea',
            'email'          => 'lea@hotmail.com',
            'group'          => '2184',
            'is_admin'       => '0',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
        ]);

        User::create([
            'name'           => 'Cedric',
            'email'          => 'cedric@hotmail.com',
            'group'          => '2384',
            'is_admin'       => '0',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
        ]);

        User::create([
            'name'           => 'Morgan',
            'email'          => 'morgan@hotmail.com',
            'group'          => '2383',
            'is_admin'       => '0',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
        ]);

        User::create([
            'name'           => 'Isa',
            'email'          => 'isa@hotmail.com',
            'group'          => '2383',
            'is_admin'       => '0',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
        ]);

        User::create([
            'name'           => 'Spirlet',
            'email'          => 'spirlet@hotmail.com',
            'group'          => '2183',
            'is_admin'       => '1',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'RvlORzs8dyG8IYqssJGcuOY2F0vnjBy2PnHHTX2MoV7Hh6udjJd6hcTox3un',
        ]);



    }
}
