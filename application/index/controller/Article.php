<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/16
 * Time: 12:20
 */

namespace app\index\controller;
use think\Controller;

class Article extends Controller
{
    public function index()
    {
        return $this->fetch('article');
    }
}