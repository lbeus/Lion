<?php
$this->breadcrumbs=array(
	'Prod Users'=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProdUsers', 'url'=>array('index')),
	array('label'=>'Create ProdUsers', 'url'=>array('create')),
	array('label'=>'View ProdUsers', 'url'=>array('view', 'id'=>$model->user_id)),
	array('label'=>'Manage ProdUsers', 'url'=>array('admin')),
);
?>

<h1>Update ProdUsers <?php echo $model->user_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>