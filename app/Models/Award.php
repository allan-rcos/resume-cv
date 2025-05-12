<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    /** @use HasFactory<\Database\Factories\AwardFactory> */
    use HasFactory, BelongsToOneUser;

    protected $guarded = ['id', 'user_id'];
    public $timestamps = false;
}
