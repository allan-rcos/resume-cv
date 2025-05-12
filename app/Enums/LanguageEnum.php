<?php

namespace App\Enums;

enum LanguageEnum: int
{
    case EN = 0;
    case PT = 1;
    case ES = 2;
    case FR = 3;
    case DE = 4;
    case IT = 5;
    case JA = 6;
    case ZH = 7;
    case RU = 8;
    case AR = 9;
    case KO = 10;
    case HI = 11;
    case BN = 12;
    case TR = 13;
    case VI = 14;
    case ID = 15;
    case MS = 16;
    case TH = 17;
    case PL = 18;
    case SV = 19;

    public function name(): string
    {
        return match($this) {
            LanguageEnum::EN => 'Inglês',
            LanguageEnum::PT => 'Português',
            LanguageEnum::ES => 'Espanhol',
            LanguageEnum::FR => 'Francês',
            LanguageEnum::DE => 'Alemão',
            LanguageEnum::IT => 'Italiano',
            LanguageEnum::JA => 'Japonês',
            LanguageEnum::ZH => 'Chinês',
            LanguageEnum::RU => 'Russo',
            LanguageEnum::AR => 'Árabe',
            LanguageEnum::KO => 'Coreano',
            LanguageEnum::HI => 'Hindi',
            LanguageEnum::BN => 'Bengali',
            LanguageEnum::TR => 'Turco',
            LanguageEnum::VI => 'Vietnamita',
            LanguageEnum::ID => 'Indonésio',
            LanguageEnum::MS => 'Malaio',
            LanguageEnum::TH => 'Tailandês',
            LanguageEnum::PL => 'Polonês',
            LanguageEnum::SV => 'Sueco',
        };
    }
}
