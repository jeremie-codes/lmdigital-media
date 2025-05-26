<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Site administrator with full access to all features',
            ],
            [
                'name' => 'editor',
                'display_name' => 'Editor',
                'description' => 'Can manage all content but has limited access to site settings',
            ],
            [
                'name' => 'author',
                'display_name' => 'Author',
                'description' => 'Can create and manage their own content',
            ],
            [
                'name' => 'contributor',
                'display_name' => 'Contributor',
                'description' => 'Can create content but cannot publish it',
            ],
            [
                'name' => 'subscriber',
                'display_name' => 'Subscriber',
                'description' => 'Has access to premium content',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Create permissions
        $permissions = [
            // Articles
            ['name' => 'articles.view', 'display_name' => 'View Articles', 'description' => 'Can view all articles'],
            ['name' => 'articles.create', 'display_name' => 'Create Articles', 'description' => 'Can create new articles'],
            ['name' => 'articles.edit', 'display_name' => 'Edit Articles', 'description' => 'Can edit all articles'],
            ['name' => 'articles.delete', 'display_name' => 'Delete Articles', 'description' => 'Can delete articles'],
            ['name' => 'articles.publish', 'display_name' => 'Publish Articles', 'description' => 'Can publish articles'],
            ['name' => 'articles.feature', 'display_name' => 'Feature Articles', 'description' => 'Can feature articles'],
            
            // Categories
            ['name' => 'categories.view', 'display_name' => 'View Categories', 'description' => 'Can view all categories'],
            ['name' => 'categories.create', 'display_name' => 'Create Categories', 'description' => 'Can create new categories'],
            ['name' => 'categories.edit', 'display_name' => 'Edit Categories', 'description' => 'Can edit categories'],
            ['name' => 'categories.delete', 'display_name' => 'Delete Categories', 'description' => 'Can delete categories'],
            
            // Media
            ['name' => 'media.view', 'display_name' => 'View Media', 'description' => 'Can view all media'],
            ['name' => 'media.upload', 'display_name' => 'Upload Media', 'description' => 'Can upload new media'],
            ['name' => 'media.edit', 'display_name' => 'Edit Media', 'description' => 'Can edit media details'],
            ['name' => 'media.delete', 'display_name' => 'Delete Media', 'description' => 'Can delete media'],
            
            // Comments
            ['name' => 'comments.view', 'display_name' => 'View Comments', 'description' => 'Can view all comments'],
            ['name' => 'comments.moderate', 'display_name' => 'Moderate Comments', 'description' => 'Can moderate comments'],
            
            // Users
            ['name' => 'users.view', 'display_name' => 'View Users', 'description' => 'Can view all users'],
            ['name' => 'users.create', 'display_name' => 'Create Users', 'description' => 'Can create new users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users', 'description' => 'Can edit user details'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users', 'description' => 'Can delete users'],
            
            // Roles and permissions
            ['name' => 'roles.view', 'display_name' => 'View Roles', 'description' => 'Can view all roles'],
            ['name' => 'roles.manage', 'display_name' => 'Manage Roles', 'description' => 'Can manage roles and assign permissions'],
            
            // Settings
            ['name' => 'settings.view', 'display_name' => 'View Settings', 'description' => 'Can view site settings'],
            ['name' => 'settings.manage', 'display_name' => 'Manage Settings', 'description' => 'Can change site settings'],
            
            // Menus
            ['name' => 'menus.view', 'display_name' => 'View Menus', 'description' => 'Can view menus'],
            ['name' => 'menus.manage', 'display_name' => 'Manage Menus', 'description' => 'Can manage menus'],
            
            // SEO
            ['name' => 'seo.view', 'display_name' => 'View SEO', 'description' => 'Can view SEO settings'],
            ['name' => 'seo.manage', 'display_name' => 'Manage SEO', 'description' => 'Can manage SEO settings'],
            
            // Advertising
            ['name' => 'ads.view', 'display_name' => 'View Ads', 'description' => 'Can view ad banners'],
            ['name' => 'ads.manage', 'display_name' => 'Manage Ads', 'description' => 'Can manage ad banners'],
            
            // Pages
            ['name' => 'pages.view', 'display_name' => 'View Pages', 'description' => 'Can view all pages'],
            ['name' => 'pages.create', 'display_name' => 'Create Pages', 'description' => 'Can create new pages'],
            ['name' => 'pages.edit', 'display_name' => 'Edit Pages', 'description' => 'Can edit pages'],
            ['name' => 'pages.delete', 'display_name' => 'Delete Pages', 'description' => 'Can delete pages'],
            
            // Newsletter
            ['name' => 'newsletter.view', 'display_name' => 'View Newsletters', 'description' => 'Can view newsletters'],
            ['name' => 'newsletter.create', 'display_name' => 'Create Newsletters', 'description' => 'Can create newsletters'],
            ['name' => 'newsletter.send', 'display_name' => 'Send Newsletters', 'description' => 'Can send newsletters'],
            
            // Analytics
            ['name' => 'analytics.view', 'display_name' => 'View Analytics', 'description' => 'Can view site analytics'],
            
            // Social media
            ['name' => 'social.manage', 'display_name' => 'Manage Social Media', 'description' => 'Can manage social media connections'],
            
            // Subscriptions
            ['name' => 'subscriptions.view', 'display_name' => 'View Subscriptions', 'description' => 'Can view subscription plans and subscribers'],
            ['name' => 'subscriptions.manage', 'display_name' => 'Manage Subscriptions', 'description' => 'Can manage subscription plans and pricing'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Assign permissions to roles
        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->permissions()->attach(Permission::all());

        $editorRole = Role::where('name', 'editor')->first();
        $editorPermissions = [
            'articles.view', 'articles.create', 'articles.edit', 'articles.delete', 'articles.publish', 'articles.feature',
            'categories.view', 'categories.create', 'categories.edit',
            'media.view', 'media.upload', 'media.edit',
            'comments.view', 'comments.moderate',
            'pages.view', 'pages.create', 'pages.edit',
            'tags.view', 'tags.create', 'tags.edit',
            'newsletter.view', 'newsletter.create',
            'analytics.view',
            'menus.view',
            'seo.view',
        ];
        $editorRole->permissions()->attach(
            Permission::whereIn('name', $editorPermissions)->get()
        );

        $authorRole = Role::where('name', 'author')->first();
        $authorPermissions = [
            'articles.view', 'articles.create', 'articles.edit',
            'categories.view',
            'media.view', 'media.upload',
            'comments.view',
        ];
        $authorRole->permissions()->attach(
            Permission::whereIn('name', $authorPermissions)->get()
        );

        $contributorRole = Role::where('name', 'contributor')->first();
        $contributorPermissions = [
            'articles.view', 'articles.create',
            'categories.view',
            'media.view', 'media.upload',
        ];
        $contributorRole->permissions()->attach(
            Permission::whereIn('name', $contributorPermissions)->get()
        );
    }
}