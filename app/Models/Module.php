<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- TAMBAHKAN INI
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- TAMBAHKAN INI

class Module extends Model
{
    use HasFactory;

    /**
     * Module ini milik satu Course.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Module ini punya banyak record Progress (dari banyak siswa).
     */
    public function progress(): HasMany
    {
        return $this->hasMany(StudentProgress::class);
    }
}