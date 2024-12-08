<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Permisos para Productos
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'show product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'index product']);
        Permission::create(['name' => 'store product']);

        // Permisos para Categorías
        Permission::create(['name' => 'show categories']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'index category']);
        Permission::create(['name' => 'store category']);

        // Permisos para Mercados
        Permission::create(['name' => 'index markets']);
        Permission::create(['name' => 'show markets']);
        Permission::create(['name' => 'create market']);
        Permission::create(['name' => 'store market']);
        Permission::create(['name' => 'edit market']);
        Permission::create(['name' => 'delete market']);

        // Permisos para Ofertas
        Permission::create(['name' => 'show offers']);
        Permission::create(['name' => 'create offer']);
        Permission::create(['name' => 'edit offer']);
        Permission::create(['name' => 'delete offer']);
        Permission::create(['name' => 'index offer']);
        Permission::create(['name' => 'store offer']);

        // Permisos para los usuarios
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'index users']);
        Permission::create(['name' => 'store user']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Crear el rol de manager con permisos específicos
        $managerRole = Role::create(['name' => 'manager'])->givePermissionTo([
            'show categories',
            'create category',
            'edit category',
            'index category',
            'store category',
            'create product',
            'show product',
            'edit product',
            'index product',
            'store product',
            'show offers',
            'create offer',
            'index offer',
            'store offer',
        ]);

        $providerRole = Role::create(['name' => 'provider'])->givePermissionTo([
            'create product',
            'show product',
            'edit product',
            'index product',
            'store product',
            'show offers',
            'create offer',
            'index offer',
            'store offer',
        ]);

        $adminUser = User::create([
            'name' => 'Felix Carvajal',
            'email' => 'fcarvajal44@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $adminUser->assignRole($adminRole);

        $managerUser = User::create([
            'name' => 'Isargenys Contreras',
            'email' => 'isargenys@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $managerUser->assignRole($managerRole);

        $providerUser = User::create([
            'name' => 'Pedro Garcia',
            'email' => 'pgarcia@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $providerUser->assignRole($providerRole);
    }
}
