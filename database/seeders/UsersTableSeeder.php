<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Fulano',
            'email' => 'fulano@example.com',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);

        for ($i = 1; $i < 2; $i++) {
            User::create([
                'name' => 'Fulano ' . $i,
                'email' => "fulano{$i}@example.com",
                'role' => 'user',
                'password' => Hash::make('123456'),
            ]);
        }

        $this->command->info('Usuários populados com sucesso.');
    }
}
