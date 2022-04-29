<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'critic']);
        $role3 = Role::create(['name' => 'moderator']);
        //Ejemplo de permisos.
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2, $role3]);
    }
}
