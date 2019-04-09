<?php

namespace app\index\validate;

use think\Validate;

class Comment extends Validate {
	protected $rule = [ 
			'tid' => 'require',
			'content' => 'require',
			'verify|验证码'=>'require|captcha',
			'uid' => 'require' 
	];
	protected $message = [ 
			'tid.require' => '主题ID不能为空',
			'content.require' => '评论内容不能为空',
			'content.between' => '评论内容必须在80-120个字数范围',
			'verify.require' => '验证码不能为空',
			'uid.require' => '用户ID不能为空,请登录后发帖' 
	];
}