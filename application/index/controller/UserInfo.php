<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Config;
use think\Cookie;
use think\Hook;
use think\Session;
use think\Validate;




class UserInfo extends Frontend{
	protected $layout = 'default';
	protected $noNeedLogin = ['login', 'register', 'third'];
	protected $noNeedRight = ['*'];
	
	public function _initialize()
	{
		parent::_initialize();
		$auth = $this->auth;
	
		if (!Config::get('fastadmin.usercenter')) {
			$this->error(__('User center already closed'));
		}
	
		$ucenter = get_addon_info('ucenter');
		if ($ucenter && $ucenter['state']) {
			include ADDON_PATH . 'ucenter' . DS . 'uc.php';
		}
	
		//监听注册登录注销的事件
		Hook::add('user_login_successed', function ($user) use ($auth) {
			$expire = input('post.keeplogin') ? 30 * 86400 : 0;
			Cookie::set('uid', $user->id, $expire);
			Cookie::set('token', $auth->getToken(), $expire);
		});
		Hook::add('user_register_successed', function ($user) use ($auth) {
			Cookie::set('uid', $user->id);
			Cookie::set('token', $auth->getToken());
		});
		Hook::add('user_delete_successed', function ($user) use ($auth) {
			Cookie::delete('uid');
			Cookie::delete('token');
		});
		Hook::add('user_logout_successed', function ($user) use ($auth) {
			Cookie::delete('uid');
			Cookie::delete('token');
		});
	}
	public function index(){
		
	}
	public function info(){
		
	}
	public function addInfo(){
		return $this->view->fetch();
	}
	public function addInfoDo(){
		p(input('post.'));
	}
	public function album(){
		
	}
	public function work(){
		
	}
	public function life(){
		
	}
	public function marriage(){
		
	}
	public function economy(){
		
	}
	public function body(){
		
	}
	public function interest(){
		
	}
}