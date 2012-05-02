<?php
$this->breadcrumbs=array(
	'Day Parts'=>array('index'),
	$model->day_part_id=>array('view','id'=>$model->day_part_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DayPart', 'url'=>array('index')),
	array('label'=>'Create DayPart', 'url'=>array('create')),
	array('label'=>'View DayPart', 'url'=>array('view', 'id'=>$model->day_part_id)),
	array('label'=>'Manage DayPart', 'url'=>array('admin')),
);
?>

<h1>Update DayPart <?php echo $model->day_part_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>