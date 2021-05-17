<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])->assignRole([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuarios'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->assignRole([$role1]);
        // Permission::create(['name' => 'admin.users.update',
        //                     'description' => ''])->assignRole([$role1]);

        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'Ver listado de categorías'])->assignRole([$role1, $role2]);

        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Crear categorías'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Editar categorías'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Eliminar categorías'])->assignRole([$role1]);

        Permission::create(['name' => 'admin.taqs.index',
                            'description' => 'Ver listado de etiquetas'])->assignRole([$role1, $role2]);

        Permission::create(['name' => 'admin.taqs.create',
                            'description' => 'Crear etiquetas'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.taqs.edit',
                            'description' => 'Editar etiquetas'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.taqs.destroy',
                            'description' => 'Eliminar etiquetas'])->assignRole([$role1]);

        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'Ver listado de posts'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Crear posts'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Editar posts'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Eliminar posts'])->assignRole([$role1, $role2]);


    }
}
