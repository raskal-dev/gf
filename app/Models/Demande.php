<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'id_fb',
        'prenom',
        'mail',
        'num_tel',
        'date_nais',
        'cin',
        'sexe',
        'demande',
        'isinscrit'
    ];

    public function presonne()
    {
        return $this->hasMany(Personne::class);
    }
}
