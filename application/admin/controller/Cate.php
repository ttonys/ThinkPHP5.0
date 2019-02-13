<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/18
 * Time: 13:27
 */

namespace app\admin\controller;

use app\admin\model\cate as CateModel;
use app\admin\controller\Base;

class Cate extends Base
{
    public function lst()
    {
        $ad = new CateModel();
        $list = $ad->paginate(3);
        $this->assign('list', $list);
        return $this->fetch('lst');
    }

    public function update()
    {
        $id = null;
        $catename = null;
        $cate = new CateModel();
        $id = input('id');
        if (input('catename')) {
            $catename = input('catename');
            if($cate->isUpdate(true)->save(['id'=>$id, 'catename'=>$catename,])){
                return $this->success('更新成功', 'lst');
            }else{
                return $this->error('更新失败', 'lst');
            }
        }
        return $this->fetch('update');
    }
    public function del(){
        $id = input('id');
        $cate = new CateModel();
        if($cate->find($id)){
            $cate->where('id', $id)->delete();
            return $this->success('删除成功');
        }else{
            return $this->error('id不存在');
        }
    }
    public function add()
    {
        if ($this->request->isPost()) {
            $catename = input('catename');
            $cate = new CateModel();
            $cate->catename = $catename;

            if ($cate->where('catename', $catename)->find()) {
                return $this->error('栏目名称重复');
            } else if ($cate->save()) {
                return $this->success('添加成功', 'lst');
            } else {
                return $this->error('添加失败');
            }

        }
        return $this->fetch('add');
    }
}