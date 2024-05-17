<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business extends Model
{
    use HasFactory;

    protected $table='business';

    protected $fillable = ['id','user_id','title','business_categories','business_type',
    'primaryimage','street','city','state','zip','country','description','total_price',
    'business_id','year_built','employees','asking_price','gross_revenue','cash_flow','real_estate','status','reason_for_saling',
    'support_and_training','inventory',];


    public function businesscategories(){
        return $this->belongsTo(business_categories::class,'business_categories');
    }


    public function images(){
        return $this->hasMany(image::class,'business_id');    
    }

    public function videos(){
        return $this->hasMany(video::class,'business_id');    

    }
    
    public function business_user(){
        return $this->belongsTo(user::class, 'user_id');
    }

}
