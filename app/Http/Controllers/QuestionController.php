<?php

namespace App\Http\Controllers;

use App\Http\Model\Questions;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    /**
     * @Desc:添加问题
     * @author:guomin
     * @date:2017-10-10 21:31
     * @return array
     */
    public function create()
    {
        $log=new ApiController();
        if($log->is_logged_in()){
            $input=Input::all();
            $rules=[
                'title'=>'required',
                'desc'=>'required'
            ];
            $messages=[
                'title.required'=>'请输入问题',
                'desc.required'=>'请输入问题描述'
            ];
            $validator=Validator::make($input,$rules,$messages);
            if($validator->passes()){
                $input['user_id']=$log->is_logged_in();
                $re=Questions::create($input);
                if($re){
                    $data=[
                        'status'=>1,
                        'msg'=>'添加成功'
                    ];
                }
            }else{
                $errors=collect($validator->errors()->all());
                $error=$errors->implode(',');
                $data=[
                    'status'=>0,
                    'msg'=>$error
                ];
            }
            return $data;
        }else{
            return ['status'=>0,'msg'=>'请登录'];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
