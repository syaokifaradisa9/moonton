<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\MovieSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\SubcriptionPlanSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@moonton.test',
            'password' => bcrypt("password")
        ]);

        $user->assignRole('admin');

        $this->call([
            SubcriptionPlanSeeder::class,
            MovieSeeder::class,
        ]);
    }
}
