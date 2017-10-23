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
        //定义每页显示4条
        $pagesize=4;
        //当前页数
        $page=$_POST['page'];
        $skip=($page-1)*$pagesize;
        //第一页 0  第二页
        $questions=Questions::orderBy('created_at','desc')
            ->with('user')
            ->skip($skip)
            ->take($pagesize)
            ->get();
        $answers=Answers::orderBy('created_at','desc')
            ->with('user')
            ->skip($skip)
            ->take($pagesize)
            ->get();
        $questions=collect($questions->toArray());
        $answers=$answers->toArray();
        $data=$questions->merge($answers);
        $sorted = $data->sortByDesc('created_at');

        $data=$sorted->values()->all();
        return json_encode(['status'=>1,'data'=>$data],256);
    }
}
