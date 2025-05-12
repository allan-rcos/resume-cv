<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use Database\Factories\UserDataFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    /** @use HasFactory<UserDataFactory> */
    use HasFactory, BelongsToOneUser;

    protected $guarded = ['user_id'];
    public $timestamps = false;
}
