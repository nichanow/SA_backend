<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'id',
        'username',
        'name'
    ];

    public function works(){
        return $this->hasMany(Work::class);
    }

    
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    protected $hidden = [
        'password',
    ];


}
