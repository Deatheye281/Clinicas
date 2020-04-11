<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrar-usuarios', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-usuario', function($user) {
            return $user->hasRol('admin');
        });

        Gate::define('eliminar-usuario', function($user) {
            return $user->hasRol('admin');
        });
//hospital
        Gate::define('crear-hospital', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-hospital', function($user) {
            return $user->hasRol('admin');
        });

        Gate::define('eliminar-hospital', function($user) {
            return $user->hasRol(['admin']);
        });
//laboratorio
        Gate::define('crear-laboratorio', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-laboratorio', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-laboratorio', function($user) {
            return $user->hasRol(['admin']);
        });
//Detalle
        Gate::define('crear-detalle', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-detalle', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-detalle', function($user) {
            return $user->hasRol(['admin']);
        });
//diagnostico
        Gate::define('crear-diagnostico', function($user) {
            return $user->hasRol(['admin']);
        });

        Gate::define('editar-diagnostico', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-diagnostico', function($user) {
            return $user->hasRol(['admin']);
        });
//medico
        Gate::define('crear-medico', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-medico', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-medico', function($user) {
            return $user->hasRol(['admin']);
        });
//salas
        Gate::define('crear-sala', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-sala', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-sala', function($user) {
            return $user->hasRol(['admin']);
        });
//pacientes
        Gate::define('crear-paciente', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-paciente', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-paciente', function($user) {
            return $user->hasRol(['admin']);
        });
//detalle
        Gate::define('crear-detalle', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-detalle', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-detalle', function($user) {
            return $user->hasRol(['admin']);
        });
//consulta
        Gate::define('crear-consulta', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-consulta', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-consulta', function($user) {
            return $user->hasRol(['admin']);
        });
//fechadia
        Gate::define('crear-fechadia', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('editar-fechadia', function($user) {
            return $user->hasAnyRol(['admin','medico']);
        });

        Gate::define('eliminar-fechadia', function($user) {
            return $user->hasRol(['admin']);
        });
    }
}
