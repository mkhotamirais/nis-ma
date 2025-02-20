<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    /** @use HasFactory<\Database\Factories\GaleryFactory> */
    use HasFactory;

    protected $fillable = [
        'caption',
        'slug',
        'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
