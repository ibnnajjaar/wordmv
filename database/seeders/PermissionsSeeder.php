<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getData() as $model => $model_permissions) {
            foreach ($model_permissions as $permission_name) {
                Permission::updateOrCreate([
                    'name' => $permission_name,
                ], [
                    'model'      => $model,
                    'guard_name' => 'web_admin',
                ]);
            }
        }
    }

    public function getData(): array
    {
        return [
            'user' => [
                'view users',
                'create users',
                'update users',
                'delete users',
                'delete any user',
                'force delete users',
                'force delete any user',
            ],
            'role' => [
                'view roles',
                'create roles',
                'update roles',
                'delete roles',
            ],
            'settings' => [
                'view settings',
                'edit settings',
            ]
        ];
    }
}
