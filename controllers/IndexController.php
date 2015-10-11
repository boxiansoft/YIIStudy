<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Cookie;

class IndexController extends Controller{

	public $layout = 'common';
	public function actionIndex(){
		
		//render 在这里会做两件事情：
		// 1、会把index.php中的内容放到 $content 变量中。
		// 2、会加载layout中的页面（如上面定义的$layout变量）

		return $this->render('index'); 

		//return $this->renderPartial('index');
		
	}

}
?>