<?php

return [
    [
        'name' => \App\Enums\RoleEnum::COMMUNITY->label(),
        'price' => 'FREE',
        'active' => true,
        'benefits' => [
            \App\Enums\PermissionEnum::RESUME_LIMIT_5->label(),
        ],
        'require' => [
            'Renovação mensal obrigatória (Verificação por email)'
        ]
    ],
    [
        'name' => \App\Enums\RoleEnum::PROFESSIONAL->label(),
        'price' => '5',
        'active' => false,
        'benefits' => [
            \App\Enums\PermissionEnum::RESUME_LIMIT_20->label(),
            \App\Enums\PermissionEnum::PORTFOLIO->label(),
        ],
        'require' => []
    ],
    [
        'name' => \App\Enums\RoleEnum::COLLABORATORS->label(),
        'price' => 'FREE',
        'active' => false,
        'benefits' => [
            \App\Enums\PermissionEnum::RESUME_LIMIT_20->label(),
            \App\Enums\PermissionEnum::PORTFOLIO->label(),
            'Insígnia de colaborador',
        ],
        'require' => [
            'Colaboração anual com o projeto'
        ]
    ],
];
