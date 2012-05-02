<?php
$this->breadcrumbs=array(
	'Di Gsn Privileges'=>array('index'),
	$model->gsn_privilege_id=>array('view','id'=>$model->gsn_privilege_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DiGsnPrivileges', 'url'=>array('index')),
	array('label'=>'Create DiGsnPrivileges', 'url'=>array('create')),
	array('label'=>'View DiGsnPrivileges', 'url'=>array('view', 'id'=>$model->gsn_privilege_id)),
	array('label'=>'Manage DiGsnPrivileges', 'url'=>array('admin')),
);
?>

<h1>Update DiGsnPrivileges <?php echo $model->gsn_privilege_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>