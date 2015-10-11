<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Cookie;
use app\models\Test;
use app\models\Customer;
use app\models\Order;

class DatabaseController extends Controller{

	public function actionIndex(){
		
		//查询数据
		//$sql = 'select * from test where id=:id';
		//$results = Test::findBySql($sql,array(':id'=>'1'))->all();

		//id=1;
		//$results = Test::find()->where(['id'=>1])->all();
		
		//id>0
		//$results = Test::find()->where(['>','id',0])->all();

		//id>=1 并且 id<=2
		//$results = Test::find()->where(['between','id',1,2])->all();

		//title like "%title%";
		//$results = Test::find()->where(['like','title','title2'])->all();

		//查询结果转化成数组
		//$results = Test::find()->where(['between','id',1,2])->asArray()->all();
		

		//print_r($results);
		//print_r(count($results));


		//批量查询
		//foreach(Test::find()->batch(1) as $tests){
		//	print_r(count($tests));
		//	echo '<br/>';
		//}

         //删除数据
		//$results = Test::find()->where(['id'=>1])->all();
		//$results[0]->delete();

		//快捷删除数据方法
		//Test::deleteAll();//删除所有数据
		//Test::deleteAll('id>:id',array(':id'=>0)); //根据条件删除数据

		/*
		//添加数据
		$test = new Test();
		//$test->id='abc';
		$test->title='title4';
		$test->validate(); //条用验证器

		//判断验证结果是否正确

		if($test->hasErrors())
		{
			echo 'data is error';
		}
		else
		{
			$test->save();
		}
		*/

		/*
		//修改数据
		$test = Test::find()->where(['id'=>4])->one();
		print_r($test);
		$test->title='title4';
		$test->save();
		*/

		//关联查询
		/*
		//根据顾客查询他的订单信息
		$customer = Customer::find()->where(['name'=>'zhangsan'])->one();
		//print_r($customer);
		//$orders = $customer->hasMany(Order::className(),['customer_id'=>'id'])->asArray()->all();
		//新的获取订单的方法
		//$orders = $customer->getOrders();
		$orders = $customer->orders;//以属性的方式获取订单信息
		print_r($orders);
		*/
		/*
		//根据订单获取客户信息
		$order = Order::find()->where(['id'=>1])->one();
		//$customer = $order->getCustomer();
		$customer = $order->customer;
		print_r($customer);
		*/

		/*
		//关联查询结果缓存
		$customer = Customer::find()->where(['name'=>'zhangsan'])->one();
		//第一次执行的时候执行的语句是：select * from order where customer_id=...
		//如果需要执行多次这样的效率是非常低的，
		//在第二次执行前调用：unset($customer->orders);方法，那么第二次调用的时候就直接从结果集中去数据了。
		$orders = $customer->orders;
		*/

		//关联查询的多次查询
		$customer = Customer::find()->with('orders')->all();
		// select * from customer
		// select * from order where customer_id in(...)
		foreach($customer as $customer){
			$orders = $customer->orders;

		}
	}

}
?>