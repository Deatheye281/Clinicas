<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Rol;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin =Rol::where('nombre', 'admin')->first();
        $rolMedico =Rol::where('nombre', 'medico')->first();
        $rolUsuario =Rol::where('nombre', 'usuario')->first();


        $admin = User::create([
            'name' => 'Usuario Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('administrador')
        ]);

        $medico = User::create([
            'name' => 'Usuario Medico',
            'email' => 'medico@gmail.com',
            'password' => Hash::make('medico')
        ]);

        $usuario = User::create([
            'name' => 'Usuario General',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario')
        ]);

        $admin->roles()->attach($rolAdmin);
        $medico->roles()->attach($rolMedico);
        $usuario->roles()->attach($rolUsuario);
    }
}
