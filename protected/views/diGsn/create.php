<?php
$this->breadcrumbs=array(
	'Di Gsns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DiGsn', 'url'=>array('index')),
	array('label'=>'Manage DiGsn', 'url'=>array('admin')),
);
?>

<h1>Create DiGsn</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>