<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatchRecord extends Model
{
    protected $fillable = [
        'user_id',
        'species_id',
        'water_id',
        'datum',
        'suly',
        'hossz',
        'megjegyzes',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function water()
    {
        return $this->belongsTo(Water::class);
    }
}
