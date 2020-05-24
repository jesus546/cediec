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
    
    
         Permission::create([ 'name' => 'agendar cita']);
         Permission::create(['name' => 'crear cita']);
         Permission::create(['name' => 'enviar mensaje']);
         Permission::create(['name' => 'registrar usuario']);
         Permission::create(['name' => 'eliminar usuario']);
         Permission::create(['name' => 'editar usuario']);
         Permission::create(['name' => 'listar usuario']);
         Permission::create(['name' => 'usuario index']);
        
        $role = Role::create(['name' => 'User']);
        $role->givePermissionTo('agendar cita');

        $role = Role::create(['name' => 'doctor'])
        ->givePermissionTo(['enviar mensaje', 'listar usuario']);

        $role = Role::create(['name' => 'admisionista'])
        ->givePermissionTo(['registrar usuario', 'editar usuario']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    
    }
}
