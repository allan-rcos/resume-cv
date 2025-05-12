<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use App\Traits\HasHighlights;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory, HasHighlights, BelongsToOneUser;

    protected $guarded = ['id', 'user_id'];
    public $timestamps = false;
}
