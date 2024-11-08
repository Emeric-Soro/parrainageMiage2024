<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Licence3 extends Model
{
    use HasFactory;

    protected $table = 'licence3s';

    protected $fillable = [
        'nom_L3',
        'prenom_L3',
        'email_L3',
        'mot_de_passe_L3',
        'photo_L3'
    ];

    // Relation avec les réponses
    public function reponsesL3()
    {
        return $this->hasMany(Reponses_L3::class, 'id_L3');
    }

    // Relation avec la correspondance
    public function correspondances()
    {
        return $this->hasMany(Correspondance::class, 'id_L3');
    }
}
