<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            // tabla permisos
            'access',
            'view',
            'new',
            'edit',
            'delete',
            'publish',
            'unpublish',
            'printer',
            'export',];
        $roles=[
            // tabla roles
            'guest',
            'user',
            'writer',
            'moderator',
            'admin',
            'super-admin',

        ];
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        foreach ($permisos as $key => $value) {
            Permission::create(['name'=>$value]);//, 'guard_name'=>'web'
        }

        // create roles and assign created permissions
        foreach ($roles as $key => $value) {
            $role = Role::create(['name'=>$value]);//,'guard_name' => 'web'
            if ($value=='guest') {
                // dd($value);
                $role->givePermissionTo(['access']);
            } elseif ($value=='super-admin') {
                $role->givePermissionTo(Permission::all());
                // dd($value);
            }
        }
    }
}
