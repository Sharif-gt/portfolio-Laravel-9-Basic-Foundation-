<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categorie_id',
        'image',
        'tag',
        'long_description',
    ];

    public function category (){
        return $this->belongsTo(Category::class, 'categorie_id', 'id');
    }
}
