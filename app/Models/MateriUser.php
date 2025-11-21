<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriUser extends Model
{
    protected $table = 'materi_user';

    protected $fillable = [
        'user_id',
        'materi_id',
        'status',
        'completed_at',
    ];
}
