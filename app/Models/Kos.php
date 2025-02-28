<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'typekost',
        'price',
        'facilities',
        'link',
    ];

    
    
}
