<?php

namespace App\Enums;

enum SkillTypeEnum: int
{
    case SOFT = 0;
    case HARD = 1;

    public function label()
    {
        return match ($this) {
            SkillTypeEnum::SOFT => 'Soft skill',
            SkillTypeEnum::HARD => 'Hard skill'
        };
    }
}
