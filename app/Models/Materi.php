<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Module;
use App\Models\Role;
use App\Models\Student;


class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';
    protected $fillable = ['module_id', 'judul', 'konten', 'order'];

    // app/Models/Materi.php
    public function module()
    {
        return $this->belongsTo(Module::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'materi_user', 'materi_id', 'user_id')
            ->withPivot('status', 'completed_at')
            ->withTimestamps();
    }
}
