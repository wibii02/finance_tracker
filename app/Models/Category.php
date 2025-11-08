<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Income;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    // Relasi ke Income
    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
}
