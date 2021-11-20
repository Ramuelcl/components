<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// agregamos
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'Super Admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), //bcrypt('admin')
            'remember_token' => Str::random(10),

        ]);
        // All current roles will be removed from the user and replaced by the array given
        //                       $user->syncRoles(['super-admin']);
        // dd('creando super admin');

        // $user->assignRole('super-admin');
        // $user->givePermissionTo(Permission::all());

        $user=User::create([
            'name' => 'guest',
            'email' => 'guest@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('guest'), //bcrypt('guest'),
            'remember_token' => Str::random(10),
        ]);
        //                        $user->syncRoles('guest');
        //                        $user->givePermissionTo(['view']);
        //
        User::factory(48)->create();
    }
}
