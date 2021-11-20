<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $dir = 'posts';
        // chdir($dir);
        // echo "( " . \getcwd() . " - " . dirname(__FILE__) . " )";
        // Storage::disk('local')->put('example.txt', 'Contents');

        // Storage::disk('public')->deleteDirectory($dir);
        // die(' eliminado directorio ' . $dir);
        // Storage::disk('public')->makeDirectory($dir);
        // die(' creado directorio ' . $dir);
        // Storage::disk('public')->put($dir . '//example.txt', 'Contents');
        //
        // de forma individual
        // $this->call(PermisosSeeder::class);
        // $this->call(UserSeeder::class);
        // una llamada general
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            // PostSeeder::class,
            // CommentSeeder::class,

        ]);
        // Category::factory(4)->create();
        // Tag::factory(8)->create();
        // die("alto");
        // Post::factory(99)->create();
        // $this->call(PostSeeder::class);
        //
        // \App\Models\User::factory(10)->create();
    }
}
