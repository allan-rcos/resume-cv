<?php

namespace App\Models;

use App\Facades\Phone;
use App\Traits\BelongsToOneUser;
use Database\Factories\UserDataFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    /** @use HasFactory<UserDataFactory> */
    use HasFactory, BelongsToOneUser;

    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $guarded = [];

    public function phone(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Phone::format($value),
            set: fn($value) => Phone::onlyNumbers($value)
        );
    }
}
