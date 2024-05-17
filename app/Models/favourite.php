<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    use HasFactory;

    
    protected $table='favourite';

    protected $fillable = ['id','user_id','property_id','business_id'];


 
    public function favourite_business(){
        return $this->belongsTo(business::class, 'business_id');
    }

    public function favourite_property(){
        return $this->belongsTo(property::class, 'property_id');
    }

    
}
