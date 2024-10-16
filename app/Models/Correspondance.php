<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Correspondance extends Model
{
    use HasFactory;

    protected $table = 'correspondances';

    protected $fillable = [
        'id_L1',
        'id_L3'
    ];

    public function licence1()
    {
        return $this->belongsTo(Licence1::class, 'id_L1');
    }

    public function licence3()
    {
        return $this->belongsTo(Licence3::class, 'id_L3');
    }
}
