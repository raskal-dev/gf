<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Former extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_for',
        'id_form'
    ];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'id_form', 'id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'id_for', 'id');
    }
}
