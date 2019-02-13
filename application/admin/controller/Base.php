<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/18
 * Time: 11:50
 */

namespace app\admin\controller;

use think\Controller;
class Base extends Controller
{
    public function _initialize(){
        if(!session('username')){
            $this->error('请先登录系统！','Login/index');
        }
    }
}