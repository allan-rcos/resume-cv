<?php

namespace App\Models;

use App\Enums\SocialIconsEnum;
use App\Traits\BelongsToOneUser;
use Database\Factories\LinkFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /** @use HasFactory<LinkFactory> */
    use HasFactory, BelongsToOneUser;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function icon(): string
    {
        return SocialIconsEnum::from($this->icon)->icon();
    }
}
