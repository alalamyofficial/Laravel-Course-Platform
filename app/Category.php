<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $fillable = ["name"];
    protected $guarded = [];


    public function series(){

        return $this->hasMany(Series::class);
        
    }

    public function user(){

        return $this->belongsTo(User::class);

    }
}
