<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $table='blog';

    protected $fillable = ['id','user_id','title','description','status','primary_image',];

    public function images(){
   return $this->hasMany(image::class,'blog_id');    
    }

    public function videos(){
        return $this->hasMany(video::class,'blog_id');    
    }
    
    public function blog_user(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
