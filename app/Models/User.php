<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Handle the "created" event.
     *
     * @param  User  $callback
     * @return void
     */
    public static function created($callback)
    {
        $callback->syncRoles(RoleEnum::COMMUNITY->value);
    }

    /**
     * Return the name without spaces, accents and only lowercase
     * @return string
     */
    public function lower_dashed_name(): string
    {
        $name = strtolower($this->name);
        $name = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde|ring|slash);/', '$1', $name);
        return str_replace(' ', '-', $name);
    }

    /**
     * Alias method from userData.
     * @return HasOne<UserData>
     * @see $this::userData()
     */
    public function data(): HasOne
    {
        return $this->userData();
    }

    /**
     * Get the data associated to this User.
     * @return HasOne<UserData>
     */
    public function userData(): HasOne
    {
        return $this->hasOne(UserData::class);
    }

    /**
     * Get the skills associated to this User.
     * @return HasMany<Skill>
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get the projects associated to this User.
     * @return HasMany<Project>
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the links associated to this User.
     * @return HasMany<Link>
     */
    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    /**
     * Get the languages associated to this User.
     * @return HasMany<Language>
     */
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class);
    }

    /**
     * Get the employments associated to this User.
     * @return HasMany<Employment>
     */
    public function employments(): HasMany
    {
        return $this->hasMany(Employment::class);
    }

    /**
     * Get the education associated to this User.
     * @return HasMany<Education>
     */
    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    /**
     * Get the certifications associated to this User.
     * @return HasMany<Certification>
     */
    public function certifications(): HasMany
    {
        return $this->hasMany(Certification::class);
    }

    /**
     * Get the awards associated to this User.
     * @return HasMany<Award>
     */
    public function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
