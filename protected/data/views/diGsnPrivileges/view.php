<?php
$this->breadcrumbs=array(
	'Di Gsn Privileges'=>array('index'),
	$model->gsn_privilege_id,
);

$this->menu=array(
	array('label'=>'List DiGsnPrivileges', 'url'=>array('index')),
	array('label'=>'Create DiGsnPrivileges', 'url'=>array('create')),
	array('label'=>'Update DiGsnPrivileges', 'url'=>array('update', 'id'=>$model->gsn_privilege_id)),
	array('label'=>'Delete DiGsnPrivileges', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gsn_privilege_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DiGsnPrivileges', 'url'=>array('admin')),
);
?>

<h1>View DiGsnPrivileges #<?php echo $model->gsn_privilege_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gsn_privilege_id',
		'date_id_given',
		'user_id',
		'gsn_id',
		'time_privilege_given',
		'is_active',
	),
)); ?>
