<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /** @var list<string>  */
    protected $fillable = [
    'name',
    'email',
    'password',
    'engedelyszam',
    'profilkep',
    'role'
    ];



    /** @var list<string>*/


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @return array<string, string>*/
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function catches()
    
{
    return $this->hasMany(CatchRecord::class);
}

public function registrations()
{

    return $this->hasMany(Registration::class);
}

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /** @param  string  $token
     * @return void
     */

    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
