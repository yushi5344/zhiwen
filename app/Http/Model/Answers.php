<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    //
    protected $table='answers';

    public function users(){
        return $this
            ->belongsToMany('App\Http\Model\User','answer_user','answer_id')
            ->withPivot('vote')
            ->withTimestamps();
    }
    public function user(){
        return $this->belongsTo('App\Http\Model\User');
    }
    public function question(){
        return $this->belongsTo('App\Http\Model\Questions');
    }
}
