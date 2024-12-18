<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'valeur'
    ];
    public function materiel()
    {
        return $this->belongsTo(Materiel::class,'materiels_id');
    }
}
