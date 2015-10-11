<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<h1><?=Html::encode($view_hello_str); ?> </h1>	<!--原样输出-->

<h1><?=HtmlPurifier::process($view_hello_str); ?></h1> <!--过滤输出-->

<h1><?=$view_test_arr[0]; ?></h1>	<!--使用控制器中的数组-->