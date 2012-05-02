<?php
$this->breadcrumbs=array(
	'Di Gsn Privileges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DiGsnPrivileges', 'url'=>array('index')),
	array('label'=>'Manage DiGsnPrivileges', 'url'=>array('admin')),
);
?>

<h1>Create DiGsnPrivileges</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>