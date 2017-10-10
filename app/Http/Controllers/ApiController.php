<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

class ApiController extends Controller
{
    private $username;
    private $password;

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
                $user['password']=Crypt::encrypt($this->password);
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

    /**
     * @Desc:登录api
     * @author:guomin
     * @date:2017-10-10 19:59
     * @param Request $request
     * @return array
     */
    public function signin(Request $request){
        $this->get_username($request);
        if(!$request->has('username')||!$request->has('password')) {
            return ['status' => 0, 'msg' => '用户名或者密码不能为空'];
        }else{
            $user=User::where('username',$this->username)->first();
            if($user){
                if($this->username==$user->username && $this->password==Crypt::decrypt($user->password)){
                    session(['user'=>$user]);
                    return ['status' => 1, 'msg' => '登陆成功'];
                }else{
                    return ['status' => 0, 'msg' => '密码错误'];
                }
            }else{
                return ['status' => 0, 'msg' => '用户不存在'];
            }
        }
    }

    /**
     * @Desc:获取用户名和密码
     * @author:guomin
     * @date:2017-10-10 20:09
     * @param $request
     */
    private function get_username($request){
        $this->username=$request->input('username');
        $this->password=$request->input('password');
    }

    public function is_logged_in(){
        return session('user')->id ? : false;
    }

    /**
     * @Desc:登出
     * @author:guomin
     * @date:2017-10-10 20:16
     */
    public function logout(){
        session()->flush();
        return ['status'=>1,'msg'=>'退出成功'];
    }


    public function test(){
        dd(session('user')->username);
    }
}
