<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Series extends Model
{
    use Rateable;

    // protected $fillable = ["image","title","description","category"];
    protected $guarded = [];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function videos(){

        return $this->hasMany(Video::class);
        
    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function ratings()
    {
        return $this->hasMany(Rating::class,'rateable_id');
    }
}
