<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $fillable = [
        'species_id',
        'kezdete',
        'vege',
        'megjegyzes'
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }
}
