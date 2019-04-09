<?php
namespace app\index\model;

use think\Model;
class User extends Model{
	protected $name="user";
	
	public function userInfo(){
		return $this->hasOne('UserInfo');
	}
}