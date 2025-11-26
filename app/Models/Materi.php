<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';

    protected $fillable = [
        'module_id',
        'judul',
        'deskripsi',
        'file',
        'order',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'materi_user', 'materi_id', 'user_id')
            ->withPivot('status', 'completed_at')
            ->withTimestamps();
    }
}