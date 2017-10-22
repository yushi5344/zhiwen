<?php

namespace App\Http\Controllers;

use App\Http\Model\Answers;
use App\Http\Model\Questions;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommonController extends Controller
{
    //
    public function timeline(){
        $questions=Questions::orderBy('created_at','desc')
            ->with('user')
            ->skip(0)
            ->take(10)
            ->get();
        $answers=Answers::orderBy('created_at','desc')
            ->with('user')
            ->skip(0)
            ->take(10)
            ->get();
        $questions=collect($questions->toArray());
        $answers=$answers->toArray();
        $data=$questions->merge($answers);
        $sorted = $data->sortByDesc('created_at');

        $data=$sorted->values()->all();
        return json_encode(['status'=>1,'data'=>$data],256);
    }
}
