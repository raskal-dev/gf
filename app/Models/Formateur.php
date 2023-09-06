<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_form',
        'prenom_form',
        'cin_form',
        'sexe_form',
        'date_nais_form',
        'num_tel_form',
        'mail_form'
    ];

    public function former()
    {
        return $this->hasMany(Former::class);
    }
}
