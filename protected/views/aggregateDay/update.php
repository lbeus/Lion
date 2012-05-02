<?php
$this->breadcrumbs=array(
	'Aggregate Days'=>array('index'),
	$model->reading_id=>array('view','id'=>$model->reading_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AggregateDay', 'url'=>array('index')),
	array('label'=>'Create AggregateDay', 'url'=>array('create')),
	array('label'=>'View AggregateDay', 'url'=>array('view', 'id'=>$model->reading_id)),
	array('label'=>'Manage AggregateDay', 'url'=>array('admin')),
);
?>

<h1>Update AggregateDay <?php echo $model->reading_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>