<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $fillable = ['name','email','password','contact','street','city','state','zip','country','image','status',
    'description','user_role','user_type'];
    
    public function property(){
        return $this->hasMany(property::class, 'user_id');  
    }

    public function business(){
        return $this->hasMany(business::class, 'user_id');  
    }
}
