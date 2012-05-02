<?php
$this->breadcrumbs=array(
	'Agg Day Parts'=>array('index'),
	$model->reading_id=>array('view','id'=>$model->reading_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AggDayPart', 'url'=>array('index')),
	array('label'=>'Create AggDayPart', 'url'=>array('create')),
	array('label'=>'View AggDayPart', 'url'=>array('view', 'id'=>$model->reading_id)),
	array('label'=>'Manage AggDayPart', 'url'=>array('admin')),
);
?>

<h1>Update AggDayPart <?php echo $model->reading_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>