<?php
namespace app\index\controller;
use think\Db;
use \think\Controller;
use think\Request;
class Index extends Controller
{
    public function index()
    {
        //模板赋值
        $name = "ThinkPHP|md5";
        $email = "123@qq.com";
        return $this->fetch('index');
    }
}
