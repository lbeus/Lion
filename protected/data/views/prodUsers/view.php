<?php
$this->breadcrumbs=array(
	'Prod Users'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	array('label'=>'List ProdUsers', 'url'=>array('index')),
	array('label'=>'Create ProdUsers', 'url'=>array('create')),
	array('label'=>'Update ProdUsers', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Delete ProdUsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProdUsers', 'url'=>array('admin')),
);
?>

<h1>View ProdUsers #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'first_name',
		'last_name',
		'email',
		'password',
		'salt',
		'group_id',
		'ip_address',
		'active',
		'activation_code',
		'created_on',
		'last_login',
		'username',
		'forgotten_password_code',
		'remember_code',
		'phone',
	),
)); ?>
