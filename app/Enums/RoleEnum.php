<?php

namespace App\Enums;

enum RoleEnum: string
{
    case COMMUNITY     = 'community';
    case PROFESSIONAL  = 'professional';
    case COLLABORATORS = 'collaborators';
    case ADMIN         = 'admin';

    public function label(): string
    {
        return match ($this) {
            RoleEnum::COMMUNITY     => 'Comunidade',
            RoleEnum::PROFESSIONAL  => 'Profissional',
            RoleEnum::COLLABORATORS => 'Colaborador',
            RoleEnum::ADMIN         => 'Administrador',
        };
    }
}
