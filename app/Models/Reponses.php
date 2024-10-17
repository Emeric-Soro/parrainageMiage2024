<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponses extends Model
{
    use HasFactory;

    protected $table = 'reponses';

    protected $fillable = [
        'id_question',
        'libelle_reponse',
        'points'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'id_question');
    }
}
