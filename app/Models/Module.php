<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function progress(): HasMany
    {
        return $this->hasMany(StudentProgress::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status');
    }
    // app/Models/Module.php
    public function materi()
    {
        return $this->hasMany(Materi::class, 'module_id');
    }

    public function materis()
    {
        return $this->hasMany(Materi::class, 'module_id')
            ->orderBy('order', 'asc');
    }

    public function getProgressPercentageAttribute()
    {
        $total = $this->materi()->count();
        if ($total == 0) return 0;

        $userId = auth()->id();

        $completed = \App\Models\UserMateriProgress::where('user_id', $userId)
            ->whereIn('materi_id', $this->materi->pluck('id'))
            ->where('is_completed', true)
            ->count();

        return ($completed / $total) * 100;
    }
}
