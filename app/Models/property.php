<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class property extends Model
{
    use HasFactory;

    protected $table='property';

    protected $fillable = ['id','user_id','title','property_categories','property_type',
    'primaryimage','street','city','state','zip','country','description','price',
    'property_id','area','year_built','new_lunch','lighting','water','heating','gas','status',
    'expire_date','buyer_fee','frontage','bluilding_height','leased_rate','available_space','room','cap_rate','tenancy'];


 
    public function propertycategories(){
        return $this->belongsTo(property_categories::class,'property_categories');
    }

    public function images(){
        return $this->hasMany(image::class,'property_id');    
    }

    public function videos(){
        return $this->hasMany(video::class,'property_id');    

    }

    public function property_user(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
