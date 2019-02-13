<?php

/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/16
 * Time: 17:45
 */
namespace app\admin\controller;
use app\admin\controller\Base;
class Index extends  Base
{
    public function index()
    {
        return $this->fetch('index');
    }
}