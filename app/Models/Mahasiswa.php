<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // Tambahkan ini
        'nim',
        // ... kolom lain yang bisa di-mass assign
    ];

}
