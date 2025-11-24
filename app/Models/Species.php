<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $fillable = [
        'nev',
        'leiras',
        'kep',
        'előhely'
    ];

    
    public function catches()
    {
        return $this->hasMany(CatchRecord::class);
    }
}
