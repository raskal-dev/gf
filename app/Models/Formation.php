<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'module',
        'description',
        'date_debut',
        'date_fin'
    ];

    public function personne()
    {
        return $this->hasMany(Personne::class);
    }

    public function former()
    {
        return $this->hasMany(Former::class, 'id_for', 'id');
    }
}
