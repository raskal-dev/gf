<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'id_dem',
        'id_for'
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}