<?php
$this->breadcrumbs=array(
	'Agg Month Day Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AggMonthDayPart', 'url'=>array('index')),
	array('label'=>'Manage AggMonthDayPart', 'url'=>array('admin')),
);
?>

<h1>Create AggMonthDayPart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>