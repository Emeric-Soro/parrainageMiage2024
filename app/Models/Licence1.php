<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Licence1 extends Model
{
    use HasFactory;

    protected $table = 'licence1s'; // Spécifie le nom de la table si nécessaire

    // Définir les colonnes qui peuvent être massivement assignées
    protected $fillable = [
        'nom_L1',
        'prenom_L1',
        'email_L1',
        'mot_de_passe_L1',
        'photo_L1'
    ];

    // Relation avec les réponses
    public function reponsesL1()
    {
        return $this->hasMany(Reponses_L1::class, 'id_L1');
    }

    // Relation avec la correspondance
    public function correspondances()
    {
        return $this->hasMany(Correspondance::class, 'id_L1');
    }
}
