<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/16
 * Time: 16:37
 */

namespace app\index\controller;

use think\Controller;
class Cate extends Controller
{
    public function index()
    {
        return $this->fetch('list');
    }
}