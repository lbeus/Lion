<?php
$this->breadcrumbs=array(
	'Agg Day Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AggDayPart', 'url'=>array('index')),
	array('label'=>'Manage AggDayPart', 'url'=>array('admin')),
);
?>

<h1>Create AggDayPart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>