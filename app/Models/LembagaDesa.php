<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KepengurusanLembaga;

class LembagaDesa extends Model
{
    use HasFactory;

    protected $table = 'lembaga_desa';

    protected $fillable = [
        'image',
        'nama_lembaga',
        'alamat',
        'deskripsi_profil',
    ];

    public function kepengurusan()
    {
        return $this->hasMany(KepengurusanLembaga::class, 'lembaga_id', 'id');
    }
}
