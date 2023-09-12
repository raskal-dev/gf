<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pers',
        'id_for',
        'annee'
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class, 'id_pers', 'id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'id_for', 'id');
    }
}
