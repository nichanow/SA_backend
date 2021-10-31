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

    
    public function appointment_sender(){
        return $this->hasMany(Appointment::class,'sender_id');
    }
    public function appointment_receiver(){
        return $this->hasOne(Appointment::class,'receiver_id');
    }

    public function message_sender(){
        return $this->hasOne(Appointment::class,'sender_id');
    }
    public function message_receiver(){
        return $this->hasMany(Appointment::class,'receiver_id');
    }

    protected $hidden = [
        'password',
    ];


}
