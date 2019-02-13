<?php
/**
 * Created by PhpStorm.
 * User: Tonys
 * Date: 2019/1/18
 * Time: 11:48
 */

namespace app\admin\controller;

use app\admin\model\article as ArticleModel;
use app\admin\model\cate as CateModel;
use app\admin\controller\Base;
class Article extends Base
{
    public function lst(){
        $ad = new ArticleModel();
        $list = $ad->paginate(3);
        $this->assign('list', $list);
        return $this->fetch('lst');
    }

    public function del(){
        $id = input('id');
        $admin = new ArticleModel();
        if($admin->find($id)){
            $admin->where('id', $id)->delete();
            return $this->success('删除成功');
        }else{
            return $this->error('id不存在');
        }
        return $this->fetch('lst');
    }

    public function edit()
    {
        $id=input('id');
        $articles=db('Article')->find($id);
        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author'=>input('author'),
                'intro'=>input('desc'),
                'keywords'=>str_replace('，', ',', input('keywords')),
                'content'=>input('content'),
                'cateid'=>input('cateid'),
            ];
            if(input('state')=='on'){
                $data['state']=1;
            }else{
                $data['state']=0;
            }
            if($_FILES['pic']['tmp_name']){

                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
            }
            $validate = \think\Loader::validate('Article');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError()); die;
            }
            if(db('Article')->update($data)){
                $this->success('修改文章成功！','lst');
            }else{
                $this->error('修改文章失败！');
            }
            return;
        }
        $this->assign('articles',$articles);
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }
    public function add()
    {
        if(request()->isPost()){
            // dump($_POST); die;
            $data=[
                'title'=>input('title'),
                'author'=>input('author'),
                'intro'=>input('desc'),
                'keywords'=>str_replace('，', ',', input('keywords')),
                'content'=>input('content'),
                'cateid'=>input('cateid'),
                'time'=>time(),
            ];
            if(input('state')=='on'){
                $data['state']=1;
            }
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic']='/uploads/'.$info->getSaveName();
            }
            $validate = \think\Loader::validate('Article');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError()); die;
            }
            if(db('Article')->insert($data)){
                return $this->success('添加文章成功！','lst');
            }else{
                return $this->error('添加文章失败！');
            }
            return;
        }
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }
}