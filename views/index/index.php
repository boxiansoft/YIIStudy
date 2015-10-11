
<h1>hello index</h1>	

<!--视图中显示另一个视图内容-->
<?php echo $this->render('about',array('v_hello_str'=>'hello world!')); ?>

<!--定义数据块覆盖common中的内容-->
<?php $this->beginBlock('block1'); ?>
<h1>index中的内容用于在common中使用。</h1>
<?php $this->endBlock(); ?>