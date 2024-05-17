<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $table='image';

    protected $fillable = ['id','file','property_id','funding_wanted_id','business_id','blog_id','funding_id'];
}

