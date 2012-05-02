<?php
$this->breadcrumbs=array(
	'Prod Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProdUsers', 'url'=>array('index')),
	array('label'=>'Manage ProdUsers', 'url'=>array('admin')),
);
?>

<h1>Create ProdUsers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>