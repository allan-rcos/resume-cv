<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory, BelongsToOneUser;

    protected $guarded = ['id', 'user_id'];
    public $timestamps = false;
}
