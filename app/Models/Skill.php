<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use Database\Factories\SkillFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use HasFactory<SkillFactory> */
    use HasFactory, BelongsToOneUser;

    public $timestamps = false;
    protected $guarded = ['id'];
}
