<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use App\Traits\HasHighlights;
use Database\Factories\EmploymentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    /** @use HasFactory<EmploymentFactory> */
    use HasFactory, HasHighlights, BelongsToOneUser;

    public $timestamps = false;
    protected $guarded = [];
}
