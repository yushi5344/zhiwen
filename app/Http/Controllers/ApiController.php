<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

class ApiController extends Controller
{
    private $username;
    private $passoword;

    /**
     * @Desc:注册api
     * @author:guomin
     * @date:2017-10-09 23:02
     * @param Request $request
     * @return array
     */
    public function signup(Request $request){
        $this->get_username($request);
        if(!$request->has('username')||!$request->has('password')){
            return ['status'=>0,'msg'=>'用户名或者密码不能为空'];
        }else{
            $username=User::where('username',$this->username)->value('username');
            if($username){
                return ['status'=>0,'msg'=>'用户名已注册'];
            }else{
                $user=[];
                $user['password']=Crypt::encrypt($this->passoword);
                $user['username']=$this->username;
                $re=User::create($user);
                if($re){
                    return ['status'=>1,'msg'=>'注册成功'];
                }else{
                    return ['status'=>0,'msg'=>'注册失败'];
                }
            }
        }
    }

    private function get_username($request){
        $this->username=$request->input('username');
        $this->passoword=$request->input('password');
    }
}
