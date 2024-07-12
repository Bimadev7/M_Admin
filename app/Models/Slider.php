<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';

    protected $fillable = [
        'id',
        'slider1',
        'slider2',
        'slider3',
        'slider4',
    ];
}
