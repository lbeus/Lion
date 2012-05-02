<?php
$this->breadcrumbs=array(
	'Di Days'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DiDays', 'url'=>array('index')),
	array('label'=>'Manage DiDays', 'url'=>array('admin')),
);
?>

<h1>Create DiDays</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>