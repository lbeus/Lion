<?php
$this->breadcrumbs=array(
	'Di Gsns'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DiGsn', 'url'=>array('index')),
	array('label'=>'Create DiGsn', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('di-gsn-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Di Gsns</h1>

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
	'id'=>'di-gsn-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'gsn_id',
		'gsn_name',
		'gsn_url',
		'city',
		'state',
		'last_change',
		/*
		'is_active',
		'is_dummy',
		'date_activated_id',
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
