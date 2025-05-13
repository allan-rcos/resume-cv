<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AlphaNumericSpaced implements ValidationRule
{
    public const PATTERN = "/^[A-zÀ-ú ]+$/";

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match(self::PATTERN, $value))
            $fail('validation.alpha_num')->translate();
    }
}
