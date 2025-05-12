<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles                 = app(Role::class);
        $permissions           = app(Permission::class);

        $community             = $roles::findOrCreate(RoleEnum::COMMUNITY->value);
        $professional          = $roles::findOrCreate(RoleEnum::PROFESSIONAL->value);
        $collaborators         = $roles::findOrCreate(RoleEnum::COLLABORATORS->value);
        $admin                 = $roles::findOrCreate(RoleEnum::ADMIN->value);

        $resume_limit_5        = $permissions::findOrCreate(PermissionEnum::RESUME_LIMIT_5->value);
        $resume_limit_20       = $permissions::findOrCreate(PermissionEnum::RESUME_LIMIT_20->value);
        $resume_limit_disabled = $permissions::findOrCreate(PermissionEnum::RESUME_LIMIT_DISABLED->value);

        $portfolio             = $permissions::findOrCreate(PermissionEnum::PORTFOLIO->value);

        $community    ->syncPermissions($resume_limit_5);
        $professional ->syncPermissions($resume_limit_20, $portfolio);
        $collaborators->syncPermissions($resume_limit_20, $portfolio);
        $admin        ->syncPermissions($resume_limit_disabled, $portfolio);
    }
}
