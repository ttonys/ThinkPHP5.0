<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/18
 * Time: 11:48
 */

namespace app\admin\controller;

use app\admin\model\admin as AdminModel;
use app\admin\controller\Base;
class Admin extends Base
{
    public function lst(){
        $ad = new AdminModel();
        $list = $ad->paginate(3);
        $this->assign('list', $list);
        return $this->fetch('lst');
    }

    public function del(){
        $id = input('id');
        $admin = new AdminModel();
        if($admin->find($id)){
            $admin->where('id', $id)->delete();
            return $this->success('删除成功');
        }else{
            return $this->error('id不存在');
        }
    }
    public function update(){
        $id = null;
        $admin = new AdminModel();
        $username = input('username');
        $password = input('password');
        $id = input('id');
        if($admin->find($id)){
            if($password && $username){
                $admin->isUpdate(true)->save(['id'=>$id, 'username'=>$username, 'password'=>md5($password)]);
                return $this->success('更新成功');
            }else if($password){
                $admin->isUpdate(true)->save(['id'=>$id, 'password'=>md5($password)]);
                return $this->success('更新成功');
            }else{
                return $this->fetch('update');
            }
        }else{
            return $this->error('id不存在');
        }
        return $this->fetch('update');
    }

    public function add_user($username, $password)
    {
        $admin = new AdminModel();
        if($admin->where('username', $username)->find()){
            return 3; //已有用户
        }else{
            $admin->username = $username;
            $admin->password = $password;
            if($admin->save())
                return true;
            else
                return false;
        }

    }
    public function edit(){
        $id=input('id');
        $admins=db('admin')->find($id);
        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'username'=>input('username'),
            ];
            if(input('password')){
                $data['password']=md5(input('password'));
            }else{
                $data['password']=$admins['password'];
            }
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError()); die;
            }
            $save=db('admin')->update($data);
            if($save !== false){
                $this->success('修改管理员成功！','lst');
            }else{
                $this->error('修改管理员失败！');
            }
            return;
        }
        $this->assign('admins',$admins);
        return $this->fetch('update');
    }
    public function add(){
        if($this->request->isPost()){
            $username = input('username');
            $password = md5(input('password'));
            $date = ['username' => $username, 'password' => $password];
            $validate = \think\Loader::validate('Admin');

            if(!$validate->check($date)){
                $this->error($validate->getError()); die;
            }

            if($this->add_user($username, $password) === 3){
                return $this->error('用户已存在');
            } else if($this->add_user($username, $password)){
                return $this->success('添加成功');
            }else {
                return $this->error('添加失败');
            }

        }
        return $this->fetch('add');
    }

    public function logout(){
        session(null);
        $this->success('退出成功！','Login/index');
    }
}