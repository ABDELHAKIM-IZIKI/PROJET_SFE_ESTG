<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'vue',
    ];

    public function registre(){

       
        return $this->belongsTo(Registre::class, 'registres_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'users_id');
    }
}
