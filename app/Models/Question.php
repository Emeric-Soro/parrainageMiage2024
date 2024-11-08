<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'libelle_question'
    ];

    // Relation avec les réponses
    public function reponses()
    {
        return $this->hasMany(Reponses::class, 'id_question');
    }
}
