<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funding_wanted extends Model
{
    use HasFactory;
    protected $table='funding_wanted';

    protected $fillable = ['id','user_id','title',
    'primaryimage', 'funding_wanted_id','street','city','state','zip','country','description',];


    public function images(){
        return $this->hasMany(image::class,'funding_wanted_id');    
    }

    public function videos(){
        return $this->hasMany(video::class,'funding_wanted_id');    

    }
    
    public function funding_user(){
        return $this->belongsTo(user::class, 'user_id');
    }

}
