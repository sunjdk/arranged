<?php
namespace app\index\controller;

use app\common\controller\Frontend;
/**
 * 内心独白控制器
 * @author 桃谷六仙
 *
 */
class Note extends Frontend{
	public function index(){
		return $this->view->fetch();
	}
}