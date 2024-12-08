<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permisos para Products
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'show product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);

        // Permisos para Categories
        Permission::create(['name' => 'show categories']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);

        // Permisos para Markets
        Permission::create(['name' => 'show markets']);
        Permission::create(['name' => 'create market']);
        Permission::create(['name' => 'edit market']);
        Permission::create(['name' => 'delete market']);

        // Permisos para Offers
        Permission::create(['name' => 'show offers']);
        Permission::create(['name' => 'create offer']);
        Permission::create(['name' => 'edit offer']);
        Permission::create(['name' => 'delete offer']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        
        $managerRole = Role::create(['name' => 'manager'])->givePermissionTo([
            'show categories', 
            'create category',
            'edit category',
            'create product',
            'show product',
            'edit product',
            'show offers',
            'create offer'
        ]);

        $user = User::create([
            'name' => 'Felix Carvajal', 
            'email' => 'fcarvajal44@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole($adminRole);
        
        $user2 = User::create([
            'name' => 'Isargenys Contreras', 
            'email' => 'isargenys@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user2->assignRole($managerRole);
    }
}
