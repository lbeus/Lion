<?php
$this->breadcrumbs=array(
	'Agg Days'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AggDay', 'url'=>array('index')),
	array('label'=>'Manage AggDay', 'url'=>array('admin')),
);
?>

<h1>Create AggDay</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>