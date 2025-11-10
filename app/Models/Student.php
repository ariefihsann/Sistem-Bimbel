<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- TAMBAHKAN INI
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- TAMBAHKAN INI

class Student extends Model
{
    use HasFactory;

    /**
     * Biodata Student ini milik satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Student ini punya banyak Progress belajar.
     */
    public function progress(): HasMany
    {
        return $this->hasMany(StudentProgress::class);
    }
}