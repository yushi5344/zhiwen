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
}
