<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
    'nev',
    'helyszin',
    'datum_kezdete',
    'datum_vege',
    'leiras',
    'dij',
    'max_letszam'
];


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function getStatusAttribute()
    {
        $now = now();
        $kezdete = \Carbon\Carbon::parse($this->datum_kezdete);
        $vege = \Carbon\Carbon::parse($this->datum_vege);

        if ($now < $kezdete) {
            return 'nyitott';
        } elseif ($now >= $kezdete && $now <= $vege) {
            return 'aktív';
        } else {
            return 'lezárt';
        }
    }

    public function canRegister()
    {
        return $this->status === 'nyitott';
    }
}

