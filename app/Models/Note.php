<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_ev',
        'label',
        'note'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'id_pers', 'id');
    }
}
