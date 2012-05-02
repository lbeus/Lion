<?php
$this->breadcrumbs=array(
	'Agg Month Day Parts'=>array('index'),
	$model->reading_id=>array('view','id'=>$model->reading_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AggMonthDayPart', 'url'=>array('index')),
	array('label'=>'Create AggMonthDayPart', 'url'=>array('create')),
	array('label'=>'View AggMonthDayPart', 'url'=>array('view', 'id'=>$model->reading_id)),
	array('label'=>'Manage AggMonthDayPart', 'url'=>array('admin')),
);
?>

<h1>Update AggMonthDayPart <?php echo $model->reading_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>