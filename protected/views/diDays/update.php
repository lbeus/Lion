<?php
$this->breadcrumbs=array(
	'Di Days'=>array('index'),
	$model->date_id=>array('view','id'=>$model->date_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DiDays', 'url'=>array('index')),
	array('label'=>'Create DiDays', 'url'=>array('create')),
	array('label'=>'View DiDays', 'url'=>array('view', 'id'=>$model->date_id)),
	array('label'=>'Manage DiDays', 'url'=>array('admin')),
);
?>

<h1>Update DiDays <?php echo $model->date_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>