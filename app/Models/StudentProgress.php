<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- TAMBAHKAN INI

use App\Models\Module;
use App\Models\Materi;
use App\Models\Role;
use App\Models\Student;

class StudentProgress extends Model
{
    use HasFactory;


    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }


    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
