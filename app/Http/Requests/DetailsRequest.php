<?php

namespace App\Http\Requests;

use App\Rules\AlphaNumericSpaced;
use App\Rules\Phone;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DetailsRequest extends FormRequest
{
    protected $errorBag = 'updateDetails';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'career' => ['nullable', 'min:3', 'max:255', new AlphaNumericSpaced()],
            'phone' => ['nullable', new Phone()],
            'address' => ['nullable', 'max:255'],
            'summary' => ['nullable', 'max:2000']
        ];
    }
}
