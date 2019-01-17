<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/16
 * Time: 17:52
 */

namespace app\admin\controller;
use think\Controller;
class Add extends Controller
{
    public function index()
    {
        return $this->fetch('add');
    }
}