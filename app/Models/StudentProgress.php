<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- TAMBAHKAN INI

class StudentProgress extends Model
{
    use HasFactory;

    /**
     * Record progress ini milik satu Student.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Record progress ini milik satu Module.
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}