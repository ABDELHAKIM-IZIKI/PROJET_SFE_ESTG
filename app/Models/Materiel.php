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

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function caracteristique()
    {
        return $this->hasMany(Caracteristique::class);
    }
    
}
