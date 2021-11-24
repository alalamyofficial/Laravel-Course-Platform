<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title','user_id','slug','description','video','episode_number','series_id'];

    public function series(){

        return $this->belongsTo(Series::class);
        
    }

    public function user(){

        return $this->belongsTo(User::class);

    }

}
