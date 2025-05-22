<?php

namespace App\Models;

use App\Enums\LanguageEnum;
use App\Enums\LanguageProficiencyEnum;
use App\Traits\BelongsToOneUser;
use Database\Factories\LanguageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /** @use HasFactory<LanguageFactory> */
    use HasFactory, BelongsToOneUser;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function proficiency(): string
    {
        return LanguageProficiencyEnum::from($this->proficiency)->name();
    }

    public function name(): string
    {
        return LanguageEnum::from($this->language)->name();
    }
}
