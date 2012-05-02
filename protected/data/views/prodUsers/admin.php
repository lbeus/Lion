<?php
$this->breadcrumbs=array(
	'Prod Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProdUsers', 'url'=>array('index')),
	array('label'=>'Create ProdUsers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prod-users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Prod Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prod-users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'user_id',
		'first_name',
		'last_name',
		'email',
		'password',
		'group_id',
		'active',
		/*
		'salt',		
		'ip_address',
		'activation_code',
		'created_on',
		'last_login',
		'username',
		'forgotten_password_code',
		'remember_code',
		'phone',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
