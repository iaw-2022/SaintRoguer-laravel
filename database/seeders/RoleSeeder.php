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
        $role3 = Role::create(['name' => 'talent-agent']);

        //Arts.
        Permission::create(['name' => 'arts.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'arts.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'arts.edit'])->syncRoles([$role1]);

        //Actors / Actresses.
        Permission::create(['name' => 'actors-actresses.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'actors-actresses.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'actors-actresses.destroy'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'actors-actresses.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'actors-actresses.addToArt'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'actors-actresses.removeFromArt'])->syncRoles([$role1, $role3]);

        //Critics.
        Permission::create(['name' => 'critics.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'critics.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'critics.edit'])->syncRoles([$role1, $role2]);

        //Tags.
        Permission::create(['name' => 'tags.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'tags.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'tags.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'tags.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'tags.manage'])->syncRoles([$role1]);
        Permission::create(['name' => 'tags.add'])->syncRoles([$role1]);
        Permission::create(['name' => 'tags.remove'])->syncRoles([$role1]);


        
    }
}
