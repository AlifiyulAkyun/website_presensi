<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';
    protected $fillable = ['label', 'kelas_id', 'datetime', 'status', 'confident'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}