<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'profile_photo_path',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    /**
     * Get the articles authored by the user.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    /**
     * Get the comments by the user.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * Determine if the user has a specific role.
     */
    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }

    /**
     * Determine if the user has a specific permission.
     */
    public function hasPermission($permission): bool
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasDirectPermission($permission);
    }

    /**
     * Determine if the user has a permission through a role.
     */
    protected function hasPermissionThroughRole($permission): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the user has a given direct permission.
     */
    protected function hasDirectPermission($permission): bool
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }

        return (bool) $permission->intersect($this->permissions)->count();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

}
