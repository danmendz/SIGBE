<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',
            'ver roles',
            'crear roles',
            'editar roles',
            'eliminar roles',
            'ver permisos',
            'crear permisos',
            'editar permisos',
            'eliminar permisos',
        ];

        foreach ($permissions as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        $admin = Role::where('name', 'administrador')->first();
        $revisor = Role::where('name', 'revisor')->first();
        $estudiante = Role::where('name', 'estudiante')->first();

        if ($admin) {
            $admin->syncPermissions(Permission::all());
        }

        if ($revisor) {
            $revisor->syncPermissions([]);
        }

        if ($estudiante) {
            $estudiante->syncPermissions([]);
        }
    }
}
