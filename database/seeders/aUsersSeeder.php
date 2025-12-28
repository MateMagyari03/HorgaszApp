<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Concerns\SeedsTable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class aUsersSeeder extends Seeder
{
    use SeedsTable;

    protected static string $table = 'users';

    private static $records = [];
    private static $userNames = 
        [
            "np" => "Nagy Péter",
            "kj" => "Kovács János",
            "ti" => "Tóth István",
            "szg" => "Szabó Gábor", 
            "hm" => "Horváth Márk",
            "vz" => "Varga Zoltán",
            "kb" => "Kiss Balázs",
            "fd" => "Farkas Dávid",
            "la" => "Lakatos Ádám",
            "mt" => "Molnár Tamás"
        ];


    public function run(): void
    {
        foreach (self::$userNames as $index => $name) {
            self::$records[] = User::create([
                'name' => $name,
                'email' => $index. '@gmail.com',
                'password' => Hash::make('password'),
                'engedelyszam' => 'HU-2024-' .$index,
                'role' => 'user',
                'email_verified_at' => now(),
            ]);
        }
        User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'engedelyszam' => 'admin',
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);        
    }
}
