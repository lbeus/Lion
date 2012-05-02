<?php
$this->breadcrumbs=array(
	'Aggregate Day Parts'=>array('index'),
	$model->reading_id=>array('view','id'=>$model->reading_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AggregateDayPart', 'url'=>array('index')),
	array('label'=>'Create AggregateDayPart', 'url'=>array('create')),
	array('label'=>'View AggregateDayPart', 'url'=>array('view', 'id'=>$model->reading_id)),
	array('label'=>'Manage AggregateDayPart', 'url'=>array('admin')),
);
?>

<h1>Update AggregateDayPart <?php echo $model->reading_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>