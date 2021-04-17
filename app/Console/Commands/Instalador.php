<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando ejecuta el instalador inicial del pryecto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!$this->verificar()){
            //$this->info('El comando fue exitoso!');
            $rol = $this->crearRoleSuperAdmin();
            $usuario = $this->crearUsuarioSuperAdmin();
            $usuario->roles()->attach($rol);
            $this->info('El Rol y Usuario Administrador se instalaron correctamente');
        }else{
            $this->error('No se puede ejecutar el instalador, porque ya hay un rol creado');
        }

    }

    private function verificar(){
        return $rol = Role::find(1);
    }

    private function crearRoleSuperAdmin(){
        return Role::create([
            'name' => 'SuperAdmin',
            'guard_name' => 'web'
        ]);
    }

    private function crearUsuarioSuperAdmin(){
        return User::create([
            'name' => 'Henry Alexander Chirinos',
            'user' => 'hchirinos',
            'password' => Hash::make('@xch1'),
            'email' => 'axchi72@gmail.com',
            'status' => 1,
            'createdby' => 'hchirinos',

        ]);
    }
}
