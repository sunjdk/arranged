<?php
namespace app\index\validate;

use think\Validate;
class Topic extends Validate{
	protected $rule=[
		'title'=>'require|length:10,30|token',
		'content'=>'require|length:50,1025',
		'uid'=>'require',	
		'verify|验证码'=>'require|captcha',
	];
	protected $message=[
			'title.require'=>'话题的标题不能为空',
			'title.length'=>'话题的字数在10-30字以内',
			'content.require'=>'话题的内容不能为空',
			'content.length'=>'话题的字数在50-1025字以内',
			'uid.require'=>'用户id不能为空',
	];
}