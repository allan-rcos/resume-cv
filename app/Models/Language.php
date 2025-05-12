<?php

namespace App\Models;

use App\Enums\LanguageEnum;
use App\Enums\LanguageProficiencyEnum;
use App\Traits\BelongsToOneUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /** @use HasFactory<\Database\Factories\LanguageFactory> */
    use HasFactory, BelongsToOneUser;

    protected $guarded = ['id', 'user_id'];
    public $timestamps = false;

    public function name(): string
    {
        return LanguageEnum::from($this->language)->name();
    }

    public function proficiency(): string
    {
        return LanguageProficiencyEnum::from($this->proficiency)->name();
    }
}
