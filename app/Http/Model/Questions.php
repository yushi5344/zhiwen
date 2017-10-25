<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table='questions';
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\Http\Model\User');
    }

    public function answers(){
        return $this->hasMany('App\Http\Model\Answers','question_id');
    }

    public function answers_with_userinfo(){
        return $this->answers()->with('user');
    }
}
