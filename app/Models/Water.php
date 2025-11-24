<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $fillable = [
    'nev',
    'helyszin',
    'tipus',
    'leiras',
    'kep'
];


    public function catches()
    {
        return $this->hasMany(CatchRecord::class);
    }
}
