<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Staff;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            //CREO LOS ROLES
            $admin  =   Role::create(['name' => 'admin']);
            $staff =  Role::create(['name' => 'staff']);

            // Crear permiso para el acceso al panel de administración
            $adminAccessPermission = Permission::create(['name' => 'access admin panel']);
            $admin->givePermissionTo(Permission::all());

            // Crear permiso para el acceso al panel de tienda
            $staffAccessPermission = Permission::create(['name' => 'access staff dashboard']);
            $staff->givePermissionTo('access staff dashboard');

            foreach (Staff::all() as $staffUser) {
                $staffUser->assignRole('staff');
            }
    }
}
