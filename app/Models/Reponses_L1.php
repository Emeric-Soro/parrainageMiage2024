<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponses_L1 extends Model
{
    use HasFactory;

    protected $table = 'reponses_l1s';

    protected $fillable = [
        'id_L1',
        'id_question',
        'id_reponse',
        'points_obtenus'
    ];

    // Relation avec la table Licence1
    public function licence1()
    {
        return $this->belongsTo(Licence1::class, 'id_L1');
    }

    // Relation avec la table Question
    public function question()
    {
        return $this->belongsTo(Questions::class, 'id_question');
    }

    // Relation avec la table Reponse
    public function reponse()
    {
        return $this->belongsTo(Reponses::class, 'id_reponse');
    }
}
