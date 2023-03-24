<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'User']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Bloger']);

        Permission::create(['name' => 'admin.dasboard'])->syncRoles([$role1, $role2, $role3]);




        //$role1->givePermissionTo($permission1);
        //$permission1->assingRole($role1);
    }
}
