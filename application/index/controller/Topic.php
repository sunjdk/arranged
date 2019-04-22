<?php
namespace app\index\controller;

use think\Controller;
use app\common\controller\Frontend;
//话题管理
class Topic extends Frontend{
	protected $noNeedLogin = ['show','detail'];
	
	protected $model;
	// 初始化控制器
	public function _initialize()
	{
		parent::_initialize();
		$this->model=model('Topic');
	}
	
	//发布话题
	public function index(){
		return $this->fetch();
	}
	//发布话题处理
	public function publish(){
		$uid=cookie('uid');
		$post=input('post.');
		$topic=$this->model;
		$post['uid']=$uid;
		if(request()->isPost()){			
			$validate=validate('topic');
			if($validate->check($post)){
				unset($post['verify']);
				unset($post['__token__']);
				$post['createtime']=time();
				if($topic->data($post)->save()){
					$this->success('话题发布成功',url('show'));
				}else{
					$this->error('话题发表失败，请检查问题');
				}			
			}else{
				$this->error(__($validate->getError()));
			}
			
		}else{
			$this->error('非法请求');
		}
	}
	//展示话题
	public function show(){
		$topic=$this->model->order('createtime desc')->paginate(5);
		$this->assign('topic',$topic);
		return $this->fetch();
	}
	//话题详情页面
	public function detail(){
		$id=input('param.id');
		
		$topic=$this->model->with('user')->find($id);
		//$topicuser=$this->model->with('user')->find($id);

		//$topic=collection($this->model->with('user')->find())->toArray()   ;
		//print_r($topic->user->username);die;
		$this->assign('topic',$topic);
		//$this->assign('topicuser',$topicuser);
		return $this->fetch();
	}
}