<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponses_L3 extends Model
{
    use HasFactory;

    protected $table = 'reponses_l3s';

    protected $fillable = [
        'id_L3',
        'id_question',
        'id_reponse',
        'points_obtenus'
    ];

    public function licence3()
    {
        return $this->belongsTo(Licence3::class, 'id_L3');
    }

    public function question()
    {
        return $this->belongsTo(Questions::class, 'id_question');
    }

    public function reponse()
    {
        return $this->belongsTo(Reponses::class, 'id_reponse');
    }
}
