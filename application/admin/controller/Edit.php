<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/16
 * Time: 17:53
 */

namespace app\admin\controller;

use think\Controller;
class Edit extends Controller
{
    public function index()
    {
        return $this->fetch('edit');
    }
}