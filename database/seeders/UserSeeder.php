<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'bio' => 'Administrator of the site',
            'is_active' => true,
        ]);
        
        $adminUser->roles()->attach(Role::where('name', 'admin')->first());

        // Create editor user
        $editorUser = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'bio' => 'Content editor for the site',
            'is_active' => true,
        ]);
        
        $editorUser->roles()->attach(Role::where('name', 'editor')->first());

        // Create author user
        $authorUser = User::create([
            'name' => 'Author User',
            'email' => 'author@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'bio' => 'Regular content author',
            'is_active' => true,
        ]);
        
        $authorUser->roles()->attach(Role::where('name', 'author')->first());

        // Create more users with different roles if needed
        User::factory(5)->create()->each(function ($user) {
            $user->roles()->attach(
                Role::where('name', 'contributor')->first()
            );
        });
    }
}