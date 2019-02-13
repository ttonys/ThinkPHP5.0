<?php

/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/17
 * Time: 19:58
 */

namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:25',
        'password' =>  'require',
    ];

}