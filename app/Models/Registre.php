<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registre extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'materiels_id',
        'etats_id' ,
    'rapport' ,
    'lieu',
    'date',
    'id'
    ];

    public function user(){

        return $this->belongsTo(User::class, 'users_id');
    }

    public function materiel(){

        return $this->belongsTo(Materiel::class, 'materiels_id');
    }

    public function etat(){

        return $this->belongsTo(Etat::class, 'etats_id');
    }


    
}
