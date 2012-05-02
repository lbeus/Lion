<?php
$this->breadcrumbs=array(
	'Di Gsns'=>array('index'),
	$model->gsn_id=>array('view','id'=>$model->gsn_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DiGsn', 'url'=>array('index')),
	array('label'=>'Create DiGsn', 'url'=>array('create')),
	array('label'=>'View DiGsn', 'url'=>array('view', 'id'=>$model->gsn_id)),
	array('label'=>'Manage DiGsn', 'url'=>array('admin')),
);
?>

<h1>Update DiGsn <?php echo $model->gsn_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>