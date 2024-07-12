<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $fillable = [
        'id',
        'judul',
        'image',
        'caption_capture',
        'deskripsi_singkat',
        'deskripsi',
        'penulis'
    ];
}
