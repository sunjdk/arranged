<?php
namespace app\index\model;

use think\Model;

class Comment extends Model{
	public function topic(){
		return $this->belongsTo('topic','tid','id',[],'left');
	}
	public function user(){
		return $this->belongsTo('user','uid','id',[],'left');
	}
}