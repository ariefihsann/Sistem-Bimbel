<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- TAMBAHKAN INI

class Role extends Model
{
    use HasFactory;

    /**
     * Role ini memiliki banyak User.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}