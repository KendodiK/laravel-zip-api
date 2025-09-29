<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    public $timestamps = false;
    protected  $fillable = ['name'];
    function  city()
    {
        return $this->hasMany(City::class);
    }
}
