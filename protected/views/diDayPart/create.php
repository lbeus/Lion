<?php
$this->breadcrumbs=array(
	'Di Day Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DiDayPart', 'url'=>array('index')),
	array('label'=>'Manage DiDayPart', 'url'=>array('admin')),
);
?>

<h1>Create DiDayPart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>