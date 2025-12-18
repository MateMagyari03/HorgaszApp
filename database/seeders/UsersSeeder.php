<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Concerns\SeedsTable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    use SeedsTable;

    protected static string $table = 'users';

    private static $records = [];
    private static $userNames = 
        [
            'Nagy Péter', 'Kovács János', 'Tóth István', 'Szabó Gábor', 
            'Horváth Márk', 'Varga Zoltán', 'Kiss Balázs', 'Farkas Dávid',
            'Lakatos Ádám', 'Molnár Tamás'
        ];


    public function run(): void
    {
        foreach (self::$userNames as $index => $name) {
            self::$records[] = User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@gmail.com',
                'password' => Hash::make('password'),
                'engedelyszam' => 'HU-2024-' . str_pad($index + 1000, 5, '0', STR_PAD_LEFT),
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
