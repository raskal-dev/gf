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
        return $this->belongsTo(Demande::class, 'id_dem', 'id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'id_for', 'id');
    }

    public function evaluation()
    {
        return $this->hasMany(Evaluation::class, 'id_pers', 'id');
    }

    public function note()
    {
        return $this->hasManyThrough(Note::class, Evaluation::class, 'id_pers', 'id_ev', 'id');
    }
}
