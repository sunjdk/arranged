<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Controller;
use think\Db;
//话题评论管理

class Comment extends Frontend{
	protected $noNeedRight = ['adddo'];
	
	protected $model;
	
	//初始化控制器
	public function _initialize(){
		parent::_initialize();
		$this->model=model('comment');
	}
	
	public function addDo(){
		$post=input('post.');
		//dump($post);die;
		$uid=cookie('uid');
		
		if(request()->isPost()){
			$touid=isset($post['touid']) ? $post['touid'] : null;
			if($touid){//说明是回复评论
				$data=[
						'topic_id'=>$post['topic_id'],
						'fromid'=>$uid,
						'touid'=>$touid,
						'verify'=>$post['verify'],
						'content'=>$post['content'],
						'topic_type'=>"情感"
				];
			}else{//说明是评论
				$data=[
						'topic_id'=>$post['tid'],
						'fromid'=>$uid,
						'touid'=>null,
						'verify'=>$post['verify'],
						'content'=>$post['comment'],
						'topic_type'=>"情感"
				];
			}
			$validate=validate('Comment2');
			if($validate->check($data)){
				unset($data['verify']);
				
				if(Db::name('comment2')->data($data)->insert()){
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
	//发表评论
	public function addDo2(){
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