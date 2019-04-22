<?php
namespace app\index\model;

use think\Model;

class Comment2 extends Model{
	public function topic(){
		return $this->belongsTo('topic','topic_id','id',[],'left');
	}
	public function fromuser(){
		return $this->belongsTo('user','fromid','id',[],'left');
	}
	public function touser(){
		return $this->belongsTo('user','touid','id',[],'left');
	}
}