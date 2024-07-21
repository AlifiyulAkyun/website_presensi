<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        // ... kolom lain yang bisa di-mass assign
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan MataKuliah
    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class);
    }

    // Accessor untuk mendapatkan nama dosen dari user terkait
    public function getNamaAttribute()
    {
        return $this->user->name ?? 'Nama tidak tersedia';
    }
}