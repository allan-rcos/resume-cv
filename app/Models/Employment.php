<?php

namespace App\Models;

use App\Traits\BelongsToOneUser;
use App\Traits\HasHighlights;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    /** @use HasFactory<\Database\Factories\EmploymentFactory> */
    use HasFactory, HasHighlights, BelongsToOneUser;

    protected $guarded = ['id', 'user_id'];
    public $timestamps = false;
}
