<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use Database\Factories\AwardFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    /** @use HasFactory<AwardFactory> */
    use HasFactory, BelongsToOneUser;

    public $timestamps = false;
    protected $guarded = ['id'];
}
