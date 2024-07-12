<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LembagaDesa;

class KepengurusanLembaga extends Model
{
    use HasFactory;

    protected $table = 'kepengurusan_lembaga';

    protected $fillable = [
        'nama',
        'jabatan',
        'lembaga_id',
    ];

    public function lembagaDesa()
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_id', 'id');
    }
}
