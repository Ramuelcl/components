<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            // tabla roles
            'guest',
            'user',
            'writer',
            'moderator',
            'admin',
            'super-admin',

        ];
        // create roles and assign created permissions
        foreach ($roles as $key => $value) {
            $role = Role::create(['name'=>$value]);//,'guard_name' => 'web'
            if ($value=='guest') {
                // dd($value);
                // $role->givePermissionTo(['access']);
            } elseif ($value=='super-admin') {
                // $role->givePermissionTo(Permission::all());
                // dd($value);
            }
        }
    }
}
