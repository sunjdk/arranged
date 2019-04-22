<?php
namespace app\index\model;

use think\Model;

class Topic extends Model{
	protected $pk='id';
	protected $name='topic';
	
	//模型初始化
	protected function initialize(){
		parent::initialize();
		parent::init();			
	}

	//自定义初始化
	protected static function init(){
			
	}
	public function comment(){
		return $this->hasMany('comment','tid','id',[],'left');
	}
	
	public function comment2(){
		return $this->hasMany('comment2','topic_id','id',[],'left')->order('id desc');
	}
	
	public function user(){
		return $this->belongsTo('User','uid','id',[],'left')->field('id,username,avatar');;
	}
}