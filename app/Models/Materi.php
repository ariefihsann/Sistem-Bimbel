<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['module_id', 'judul', 'deskripsi', 'file'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
