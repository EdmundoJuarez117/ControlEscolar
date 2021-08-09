<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Reset cached roles and permissions /Reinicia roles y permisos cacheados
      app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      //Creacion de permisos
      Permission::create(['name'=>'admin.home']);


      Permission::create(['name'=>'admin.modalidad.index']);
      Permission::create(['name'=>'admin.modalidad.create']);
      Permission::create(['name'=>'admin.modalidad.edit']);
      Permission::create(['name'=>'admin.modalidad.destroy']);
      Permission::create(['name'=>'admin.carrera.index']);
      Permission::create(['name'=>'admin.carrera.create']);
      Permission::create(['name'=>'admin.carrera.edit']);
      Permission::create(['name'=>'admin.carrera.destroy']);
      // Permission::create(['name' => 'delete permission']);

      //Creacion de roles junto con los permisos asignados
       // this can be done as separate statements
      $role = Role::create(['name' => 'alumno'])
          ->givePermissionTo(['admin.home']);

      // or may be done by chaining
      $role = Role::create(['name' => 'docente'])
          ->givePermissionTo(['admin.home','admin.modalidad.index','admin.carrera.index']);

      $role = Role::create(['name' => 'administrador']);
      $role->givePermissionTo(Permission::all());
    }
}
