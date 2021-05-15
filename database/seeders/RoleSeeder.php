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

        Permission::create(['name' => 'admin.home'])->assignRole([$role1, $role2]);

        Permission::create(['name' => 'admin.categories.index'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.edit'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.destroy'])->assignRole([$role1, $role2]);

        Permission::create(['name' => 'admin.taqs.index'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.taqs.create'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.taqs.edit'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.taqs.destroy'])->assignRole([$role1, $role2]);

        Permission::create(['name' => 'admin.posts.index'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit'])->assignRole([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy'])->assignRole([$role1, $role2]);


    }
}
