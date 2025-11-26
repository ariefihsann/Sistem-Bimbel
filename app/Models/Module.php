<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'order',
        'image'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function progress()
    {
        return $this->hasMany(StudentProgress::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status');
    }

    // RELASI YANG BENAR UNTUK MATERI
    public function materis()
    {
        return $this->hasMany(Materi::class, 'module_id', 'id')
            ->orderBy('order', 'asc');
    }

    // OPTIONAL - jika kamu butuh nama pendek
    public function materi()
    {
        return $this->materis();
    }

    public function getProgressPercentageAttribute()
    {
        $total = $this->materis()->count();
        if ($total == 0) return 0;

        $userId = auth()->id();

        $completed = \App\Models\UserMateriProgress::where('user_id', $userId)
            ->whereIn('materi_id', $this->materis->pluck('id'))
            ->where('is_completed', true)
            ->count();

        return ($completed / $total) * 100;
    }
}