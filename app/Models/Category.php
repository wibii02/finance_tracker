<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'nama_kategori',
        'tipe', // pemasukan / pengeluaran
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Ambil hanya kategori milik user login
    public function scopeMilikUser($query)
    {
        return $query->where('user_id', Auth::id());
    }
}
