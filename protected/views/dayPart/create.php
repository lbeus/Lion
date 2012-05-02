<?php
$this->breadcrumbs=array(
	'Day Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DayPart', 'url'=>array('index')),
	array('label'=>'Manage DayPart', 'url'=>array('admin')),
);
?>

<h1>Create DayPart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>