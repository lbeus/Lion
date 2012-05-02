<?php
$this->breadcrumbs=array(
	'Di Day Parts'=>array('index'),
	$model->day_part_id=>array('view','id'=>$model->day_part_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DiDayPart', 'url'=>array('index')),
	array('label'=>'Create DiDayPart', 'url'=>array('create')),
	array('label'=>'View DiDayPart', 'url'=>array('view', 'id'=>$model->day_part_id)),
	array('label'=>'Manage DiDayPart', 'url'=>array('admin')),
);
?>

<h1>Update DiDayPart <?php echo $model->day_part_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>