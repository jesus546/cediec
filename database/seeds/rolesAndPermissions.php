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
    
    
         Permission::create([ 'name' => 'listar usuario']);
         Permission::create(['name' => 'listar especialidades']);
         Permission::create(['name' => 'listar empleados']);
         Permission::create(['name' => 'listar cita paciente']);
         Permission::create(['name' => 'ver citas programadas']);
         Permission::create(['name' => 'ver citas doctor']);
         Permission::create(['name' => 'asignar cita']);
         Permission::create([ 'name' => 'asignar horario doctor']);
         Permission::create(['name' => 'asignar permisos']);
         Permission::create(['name' => 'asignar especialidad']);
         Permission::create(['name' => 'editar usuario']);
         Permission::create(['name' => 'editar empleado']);
         Permission::create(['name' => 'editar especialidad']);
         Permission::create(['name' => 'editar historia clinica cirugia']);
         Permission::create(['name' => 'editar nota de evolucion']);
         Permission::create(['name' => 'editar cita paciente']);
         Permission::create(['name' => 'eliminar usuario']);
         Permission::create(['name' => 'eliminar empleado']);
         Permission::create(['name' => 'eliminar especialidad']);
         Permission::create(['name' => 'registrar usuario']);
         Permission::create(['name' => 'registrar empleado']);
         Permission::create(['name' => 'crear especialidad']);
         Permission::create(['name' => 'crear historia clinica cirugia']);
         Permission::create(['name' => 'crear y/o actualizar historia clinica medicina interna']);
         Permission::create(['name' => 'crear nota de evolucion']);

        
        $role = Role::create(['name' => 'User']);
        $role = Role::create(['name' => 'Administrador']);

        $role = Role::create(['name' => 'Doctor']);
        $role = Role::create(['name' => 'Admisionista']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    
    }
}
