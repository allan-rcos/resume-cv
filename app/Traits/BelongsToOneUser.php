<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/** Trait that defines a method to models that belongs to a User. */
trait BelongsToOneUser
{
    /**
     * Get the user that owns this model.
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
