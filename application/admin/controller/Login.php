<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/16
 * Time: 17:54
 */

namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\admin;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        if(request()->isPost()){
            $admin=new Admin();
            $data=input('post.');
            $num=$admin->login($data);
            if($num==3){
                $this->success('信息正确，正在为您跳转...','index/index');
            }elseif($num==4){
                $this->error('验证码错误');
            }
            else{
                $this->error('用户名或者密码错误');
            }

        }
        return $this->fetch('login');
    }
}