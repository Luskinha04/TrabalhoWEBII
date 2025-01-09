<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    private $permissions = [ 
        'product-list',
        'product-create',
        'product-edit',
        'product-delete',
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([ProductSeeder::class]);
        $this->call([UserSeeder::class]);

        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'Administrator']);
        $managerRole = Role::create(['name' => 'Manager']);

        foreach (Permission::all() as $permission) {
            $permission->assignRole($adminRole);
        }

        $permissionListProduct = Permission::findByName('product-list');
        $permissionListProduct->assignRole($managerRole);

        $adminUser = User::where('email', '=', 'usera@example.com')->first();
        $adminUser->assignRole('Administrator');

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
