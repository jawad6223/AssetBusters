<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property_categories extends Model
{
    use HasFactory;

    protected $table='property_categories';
    protected $fillable = ['id','name'];
}
