<?php

namespace app\index\validate;

use think\Validate;

class Comment2 extends Validate {
	protected $rule = [ 
			'topic_id' => 'require',
			'content' => 'require',
			'verify|验证码'=>'require|captcha',
			'fromid' => 'require' 
	];
	protected $message = [ 
			'topic_id.require' => '主题ID不能为空',
			'content.require' => '评论内容不能为空',
			'content.between' => '评论内容必须在80-120个字数范围',
			'verify.require' => '验证码不能为空',
			'fromid.require' => '用户ID不能为空,请登录后发帖' 
	];
}