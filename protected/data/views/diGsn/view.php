<?php
$this->breadcrumbs=array(
	'Di Gsns'=>array('index'),
	$model->gsn_id,
);

$this->menu=array(
	array('label'=>'List DiGsn', 'url'=>array('index')),
	array('label'=>'Create DiGsn', 'url'=>array('create')),
	array('label'=>'Update DiGsn', 'url'=>array('update', 'id'=>$model->gsn_id)),
	array('label'=>'Delete DiGsn', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gsn_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DiGsn', 'url'=>array('admin')),
);
?>

<h1>View DiGsn #<?php echo $model->gsn_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gsn_id',
		'gsn_name',
		'gsn_url',
		'city',
		'state',
		'is_active',
		'date_deactivated_id',
		'username',
		'password',
		'gsn_ip',
		'gsn_port',
		'port_ssl',
		'database_schema',
		'database_user',
		'database_password',
		'database_port',
		/*
		'last_change',
		'is_dummy',
		'date_activated_id',
		*/
	),
)); ?>
