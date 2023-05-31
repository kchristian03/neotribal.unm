<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function locationStar(): HasMany
    {
        return $this->hasMany(LocationStar::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'location_users');
    }
}
