<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Cookie;

class HelloController extends Controller{

	public function actionIndex(){
		$request = \YII::$app->request;

		echo "id:".$request->get('id',0)."<br/>";
		echo 'hello world!'.'<br/>';

		if($request->isGet) echo 'this is get moethod'.'<br/>';
		if($request->isPost) echo 'this is post moethod'.'<br/>';

		echo 'IP:'.$request->userIp.'<br/>';


		$response = \YII::$app->response;
		//$response->statusCode = '404';

		//跳转
		//$response->headers->add('location','http://www.baidu.com');
		//$this->redirect('http://wwww.baidu.com');

		//文件下载
		//$response->headers->add('content-disposition','attachment;filename="a.jpg"');
		//$response->sendFile('./123.jpg');

		//Session
		$session = \YII::$app->session;
		$session->open();
		if($session->isActive) echo 'session is active !'.'<br/>';
		$session->set('user','张三');
		$session->remove('user');
		echo $session->get('user','123').'<br/>';
		echo $session->get('name','123').'<br/>';

		$session['password']='123456';
		echo $session['password'].'<br/>';
		unset($session['password']);
		echo 'unset:'.$session['password'].'<br/>';

		$cookies = \YII::$app->response->cookies;

		$cookie_data = array('name'=>'user','value'=>'zhangsan');
		$cookies->add(new Cookie($cookie_data));
		echo $cookies->getValue('user','000');


		$hello_str = 'Hello God!<script>alert(3)</script>';
		$test_arr = array(1,2);
		$data = array();
		//把需要传递给视图的数据放到数字当中
		$data['view_hello_str'] = $hello_str;
		$data['view_test_arr'] = $test_arr;
		return $this->renderPartial('hello',$data); //index.php必须放到view下面的文件夹(文件夹的名字必须和控制器的名字{不能带有controller}保持一致)
	}

}
?>