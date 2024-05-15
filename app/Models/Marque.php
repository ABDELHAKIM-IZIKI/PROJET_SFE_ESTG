<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'id'
    ];

    public function materiel()
    {
        return $this->hasMany(Materiel::class);
    }
}
