<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Highlight extends Model
{
    /** @use HasFactory<\Database\Factories\HighlightFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    /**
     * Get the project associated to this highlight.
     * @return BelongsToMany<Project>
     */
    public function project(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * Get the employment associated to this highlight.
     * @return BelongsToMany<Employment>
     */
    public function employments(): BelongsToMany
    {
        return $this->belongsToMany(Employment::class);
    }

    /**
     * Get the education associated to this highlight.
     * @return BelongsToMany<Education>
     */
    public function education(): BelongsToMany
    {
        return $this->belongsToMany(Education::class);
    }

    /**
     * Get the certification associated to this highlight.
     * @return BelongsToMany<Certification>
     */
    public function certifications(): BelongsToMany
    {
        return $this->belongsToMany(Certification::class);
    }
}
