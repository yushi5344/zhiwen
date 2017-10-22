<?php

namespace App\Http\Controllers;

use App\Http\Model\Questions;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    private $user_id;//登录用户id

    /**
     * @Desc:列表显示问题
     * @author:guomin
     * @date:2017-10-10 22:47
     * @return array
     */
    public function index()
    {
        $question=Questions::orderBy('created_at')
            ->paginate(3)
            ->keyBy('id');
        return [
            'status'=>1,
            'msg'=>$question
        ];
    }


    public function create()
    {
        //TODO
    }

    /**
     * @Desc:添加问题
     * @author:guomin
     * @date:2017-10-10 21:31
     * @return array
     */
    public function store(Request $request)
    {
        $this->getUserId();
        if($this->user_id){
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
                $input['user_id']=$this->user_id;
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
            return json_encode($data,256);
        }else{
            return json_encode(['status'=>2,'msg'=>'请登录'],256);
        }
    }

    /**
     * @Desc:单条显示问题
     * @author:guomin
     * @date:2017-10-10 22:48
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $question=Questions::find($id);
        if($question){
           $data=[
               'status'=>1,
               'msg'=>$question
           ];
        }else{
            $data=[
                'status'=>0,
                'msg'=>'问题不存在'
            ];
        }
        return $data;
    }

    /**
     * @Desc:问题编辑
     * @author:guomin
     * @date:2017-10-10 22:48
     * @param $id
     * @return array
     */
    public function edit($id)
    {
        $this->getUserId();
        if($this->user_id){
            $question=Questions::find($id);
            if($question->user_id!=$this->user_id){
                return [
                    'status'=>0,
                    'msg'=>'permission denied'
                ];
            }
            if($question){
                $data=[
                    'status'=>1,
                    'msg'=>$question
                ];
            }else{
                $data=[
                    'status'=>0,
                    'msg'=>'问题不存在'
                ];
            }
            return $data;
        }else{
            return ['status'=>2,'msg'=>'请登录'];
        }
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
        // TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO RESTful路由destory方法只有delete可以访问
        //只有管理员和提问者可以删除
        //删除后这个问题下的回答也删除
        $this->getUserId();
        if($this->user_id){
            $question=Questions::find($id);
            if($question){
                if($question->user_id==$this->user_id){
                    $re=Questions::destroy($id);
                    if($re){
                        return [
                            'status'=>1,
                            'msg'=>'删除成功'
                        ];
                    }else{
                        return [
                            'status'=>0,
                            'msg'=>'删除失败'
                        ];
                    }
                }else{
                    return [
                        'status'=>0,
                        'msg'=>'permission denied'
                    ];
                }
            }
        }else{
            return [
                'status'=>0,
                'msg'=>'请登录'
            ];
        }
    }

    /**
     * @Desc:获取登录用户的id
     * @author:guomin
     * @date:2017-10-10 22:49
     */
    private function getUserId(){
        $log=new ApiController();
        $this->user_id=$log->is_logged_in();
    }
}
