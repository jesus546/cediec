<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class rolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    
    
         Permission::create([ 'name' => 'asignar cita']);
         Permission::create(['name' => 'listar cita']);
         Permission::create(['name' => 'enviar mensaje']);
         Permission::create(['name' => 'registrar usuario']);
         Permission::create(['name' => 'eliminar usuario']);
         Permission::create(['name' => 'editar usuario']);
         Permission::create(['name' => 'listar usuario']);
         Permission::create(['name' => 'listar especialidades']);
         Permission::create(['name' => 'listar empleados']);

        
        $role = Role::create(['name' => 'User']);
        $role = Role::create(['name' => 'Administrador']);

        $role = Role::create(['name' => 'Doctor']);
        $role = Role::create(['name' => 'Admisionista']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    
    }
}
