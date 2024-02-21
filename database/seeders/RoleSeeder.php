<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'DIREKTUR']);
        Role::create(['name' => 'MANAGER_OPS']);
        Role::create(['name' => 'MANAGER_KEU']);
        Role::create(['name' => 'STAFF_OPS']);
        Role::create(['name' => 'STAFF_KEU']);
    }
}
