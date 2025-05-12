<?php

namespace App\Traits;

use App\Models\Highlight;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/** Define a method to models that have many-to-many relationship with a Highlight. */
trait HasHighlights
{
    /**
     * Get the highlights associated to this Model.
     * @return BelongsToMany<Highlight>
     */
    public function highlights(): BelongsToMany
    {
        return $this->belongsToMany(Highlight::class);
    }
}
