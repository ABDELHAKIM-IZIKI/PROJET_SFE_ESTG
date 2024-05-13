<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'model',
        'description',
        'quantite',
        'barcode',
        'date',
        'categories_id',
        'marques_id',
        'image',
    ];
    
}
