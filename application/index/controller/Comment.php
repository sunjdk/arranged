<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Controller;
//话题评论管理

class Comment extends Frontend{
	protected $noNeedRight = ['adddo'];
	
	protected $model;
	
	//初始化控制器
	public function _initialize(){
		parent::_initialize();
		$this->model=model('comment');
	}
	//发表评论
	public function addDo(){
		$post=input('post.');
		$uid=cookie('uid');
		if (request()->isPost()){
			$data=[
				'tid'=>$post['tid'],
				'content'=>$post['comment'],				
				'uid'=>$uid,
				'verify'=>$post['verify'],
				'createtime'=>time()
			];
			
			$validate=validate('comment');
			if($validate->check($data)){
				unset($data['verify']);
				if($this->model->data($data)->save()){
					$this->success('评论成功');
				}else{
					$this->error('评论失败');
				}
			}else{
				$this->error($validate->getError());
			}
		}else{
			$this->error('非法请求');
		}
		
	}
}