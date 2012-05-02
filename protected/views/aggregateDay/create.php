<?php
$this->breadcrumbs=array(
	'Aggregate Days'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AggregateDay', 'url'=>array('index')),
	array('label'=>'Manage AggregateDay', 'url'=>array('admin')),
);
?>

<h1>Create AggregateDay</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>