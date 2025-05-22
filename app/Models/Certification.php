<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use App\Traits\HasHighlights;
use Database\Factories\CertificationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    /** @use HasFactory<CertificationFactory> */
    use HasFactory, HasHighlights, BelongsToOneUser;

    public $timestamps = false;
    protected $guarded = ['id'];
}
