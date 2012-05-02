<?php
$this->breadcrumbs=array(
	'Agg Days'=>array('index'),
	$model->reading_id=>array('view','id'=>$model->reading_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AggDay', 'url'=>array('index')),
	array('label'=>'Create AggDay', 'url'=>array('create')),
	array('label'=>'View AggDay', 'url'=>array('view', 'id'=>$model->reading_id)),
	array('label'=>'Manage AggDay', 'url'=>array('admin')),
);
?>

<h1>Update AggDay <?php echo $model->reading_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>