<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table='users';
    protected $guarded=[];

    public function answers(){
        return $this
            ->belongsToMany('App\Model\Http\Answer')
            ->withPivot('vote')
            ->withTimestamps();
    }
}
