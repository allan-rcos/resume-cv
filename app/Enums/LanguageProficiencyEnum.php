<?php

namespace App\Enums;

enum LanguageProficiencyEnum: int
{
    case BEGINNER = 0;
    case INTERMEDIATE = 1;
    case ADVANCED = 2;
    case NATIVE = 3;

    public function name(): string
    {
        return match($this) {
            LanguageProficiencyEnum::BEGINNER     => 'Iniciante',
            LanguageProficiencyEnum::INTERMEDIATE => 'Intermediário',
            LanguageProficiencyEnum::ADVANCED     => 'Fluente',
            LanguageProficiencyEnum::NATIVE       => 'Nativo',
        };
    }
}
