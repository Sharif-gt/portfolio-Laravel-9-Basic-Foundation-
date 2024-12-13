<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_title',
        'video',
        'image',
    ];
}
