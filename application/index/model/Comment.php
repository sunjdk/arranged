<?php
namespace app\index\model;

use think\Model;

class Comment extends Model{
	public function topic(){
		return $this->belongsTo('topic','tid','id',[],'left');
		//return $this->belongsTo('UserGroup', 'group_id', 'id', [], 'LEFT')->setEagerlyType(0);
	}
}