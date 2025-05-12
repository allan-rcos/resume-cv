<?php

namespace App\Models;

use App\Enums\SocialIconsEnum;
use App\Traits\BelongsToOneUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory, BelongsToOneUser;

    protected $guarded = ['id', 'user_id'];
    public $timestamps = false;

    public function icon(): string
    {
        return SocialIconsEnum::from($this->icon)->icon();
    }
}
