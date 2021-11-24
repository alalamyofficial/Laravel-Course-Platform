<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    public $fillable = ['rating', 'rateable_id', 'rateable_type' ,'user_id','feedback'];

    /**
     * @return mixed
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function series()
    {
        return $this->belongsTo(Series::class,'rateable_id');
    }
}
