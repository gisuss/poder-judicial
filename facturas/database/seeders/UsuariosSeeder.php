<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuariosPrueba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'Administrador',
            'password'  =>  Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $user2 = User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@example.com',
            'role' => 'Cliente',
            'password'  =>  Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
