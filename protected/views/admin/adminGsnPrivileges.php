<?php
$this->pageTitle=Yii::app()->name . ' - GSN privileges';
$this->breadcrumbs=array(
	'GSN privileges',
);
?>

<h1>GSN privileges administration</h1>
<p>You can enable or decline all user gsn privilege requests</p>

<?php
	
	$rawData=Yii::app()->db->createCommand('SELECT g.*, u.username, u.first_name || \' \' || u.last_name as full_name, p.is_active as is_privilege_active, p.gsn_privilege_id FROM di_gsn g JOIN di_gsn_privileges p ON p.gsn_id = g.gsn_id JOIN prod_users u ON u.user_id = p.user_id')->queryAll();
	// or using: $rawData=User::model()->findAll();
	$dataProvider=new CArrayDataProvider($rawData, array(
		'keyField'=>'gsn_privilege_id',
		'id' => 'gsn_privilege_id',
		'sort'=>array(
			'attributes'=>array(
				'username', 'full_name', 'gsn_name', 'city','state','gsn_url','is_active', 'is_privilege_active', 'gsn_privilege_id'
			),
		),
		'pagination'=>array(
			'pageSize'=>10,
		),
	));	


	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'di-gsn-privileges-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model->model_view,
	//'selectableRows'=>2,
	'columns'=>array(	
		//array( 'name' => 'gsn_privilege_id'),
		'username',
		'full_name',
		'gsn_name',
		'city',
		'state',
		'gsn_url',
		'is_active',
		array(
				'class'=>'CLinkColumn',
				'labelExpression'=>'($data["is_privilege_active"] == 1 ? "Revoke" : "Activation")',
				'urlExpression'=>'Yii::app()->createUrl("admin/adminGsnPrivileges", array("gsn_privilege_id"=>$data["gsn_privilege_id"]))',
				'header'=>'Activate',
			  ),		
		'is_privilege_active',
	),
));
	/*
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'di-gsn-grid',
	'dataProvider'=>$model->model_view->search_privileges(),
	'filter'=>$model->model_view,
	'selectableRows'=>2,
	'columns'=>array(
			array(
                        'class'=>'CCheckBoxColumn',            
                ),	
		//array( 'name' => 'is_active_privilege', 'value' => 'di_gsn_privileges.is_active'),		
		'gsn_name',
		'city',
		'state',
		'gsn_url',
		'is_active',
        array('name' => 'is_active_privilege',
              'value' => '($data->diGsnPrivileges->is_active_privilege is null ? "nista" : "ista")',
               'type' => 'text'),
	),
	
)); */
?>