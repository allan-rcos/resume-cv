<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use App\Traits\HasHighlights;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    /** @use HasFactory<\Database\Factories\CertificationFactory> */
    use HasFactory, HasHighlights, BelongsToOneUser;

    protected $guarded = ['id', 'user_id'];
    public $timestamps = false;
}
