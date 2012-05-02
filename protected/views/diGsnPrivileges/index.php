<?php
$this->breadcrumbs=array(
	'Di Gsn Privileges',
);

$this->menu=array(
	array('label'=>'Create DiGsnPrivileges', 'url'=>array('create')),
	array('label'=>'Manage DiGsnPrivileges', 'url'=>array('admin')),
);
?>

<h1>Di Gsn Privileges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
