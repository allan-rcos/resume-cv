<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case RESUME_LIMIT_5        = 'resume_limit_5';
    case RESUME_LIMIT_20       = 'resume_limit_20';
    case RESUME_LIMIT_DISABLED = 'resume_limit_disabled';
    case PORTFOLIO             = 'portfolio';

    public function label(): string
    {
        return match ($this) {
            PermissionEnum::RESUME_LIMIT_5        => 'Limite de cinco resumés.',
            PermissionEnum::RESUME_LIMIT_20       => 'Limite de vinte resumés.',
            PermissionEnum::RESUME_LIMIT_DISABLED => 'Sem limite de resumés.',
            PermissionEnum::PORTFOLIO             => 'Possui página de portfólio.',
        };
    }
}
