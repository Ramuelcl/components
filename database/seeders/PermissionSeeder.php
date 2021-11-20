<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        foreach ($permisos as $key => $value) {
            Permission::create(['name'=>$value]);//, 'guard_name'=>'web'
        }
    }
}
