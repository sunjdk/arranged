<?php
namespace app\index\model;

use think\Model;
class UserInfo extends Model{
	
	public function user(){
		return $this->belongsTo('User');
	}
	
	public function addInfo($uid,$data){
		$user = new User;
		$user->data([
				'name'  =>  'thinkphp',
				'email' =>  'thinkphp@qq.com'
		]);
		$res=$user->save();
		return $res;
	}
		
	
}