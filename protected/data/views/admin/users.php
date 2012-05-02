<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'prodUsers',
    'dataProvider'=>$model->search(),
	'filter' => $model,
    'columns'=>array(
        'first_name',
        'last_name',
        'email',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>