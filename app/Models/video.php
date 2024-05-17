<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    protected $table='video';

    protected $fillable = ['id','file','funding_wanted_id','property_id','business_id','blog_id','funding_id'];
}
