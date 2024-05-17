<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funding_source extends Model
{
    use HasFactory;

    protected $table='funding_source';

    protected $fillable = ['id','user_id','title',
    'primaryimage', 'funding_type_id','street','city','state','zip','country','description',];


 


    public function images(){
        return $this->hasMany(image::class,'funding_id');    
    }

    public function videos(){
        return $this->hasMany(video::class,'funding_id');    

    }
    
    public function funding_user(){
        return $this->belongsTo(user::class, 'user_id');
    }

}
