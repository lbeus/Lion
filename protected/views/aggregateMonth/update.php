<?php
$this->breadcrumbs=array(
	'Aggregate Months'=>array('index'),
	$model->reading_id=>array('view','id'=>$model->reading_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AggregateMonth', 'url'=>array('index')),
	array('label'=>'Create AggregateMonth', 'url'=>array('create')),
	array('label'=>'View AggregateMonth', 'url'=>array('view', 'id'=>$model->reading_id)),
	array('label'=>'Manage AggregateMonth', 'url'=>array('admin')),
);
?>

<h1>Update AggregateMonth <?php echo $model->reading_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>