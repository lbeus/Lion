<?php
$this->pageTitle=Yii::app()->name . ' - Notifications';
$this->breadcrumbs=array(
	'Notification',
);
?>

<h1>New notification</h1>

<?php if(Yii::app()->user->hasFlash('notification')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('notification'); ?>
</div>

<?php else: ?>

<p>
Fill in the form with data for your new notification
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'notification-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php echo $form->labelEx($model, 'notificationType'); ?>
        <div class="compactRadioGroup">
            <?php
                echo $form->radioButtonList($model, 'notificationType',
                    array(  1 => 'SMS',
                            2 => 'E-mail',
                        ),   array( 'separator' => "  ", 'onChange'=>'reload(this.form)', 'uncheckValue'=>null) );
            ?>
        </div>
        <?php echo $form->error($model, 'notificationType'); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'gsnList'); ?>
		<?php echo $form->dropDownList($model,'gsnList', CHtml::listData(diGsn::model()->findAll(), 'gsn_id', 'gsn_name'), 
		array('empty'=>'--please select--',
		'onChange'=>'reload(this.form)',
		'options' => array($model->gsn_id=>array('selected'=>true))
		)); 
		?>
		
		<?php //echo $form->error($model,'gsnList'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sensorList'); ?>
		<?php echo $form->dropDownList($model,'sensorList', CHtml::listData(diSensors::model()->findAll('gsn_id = ' . $model->gsn_id),'sensor_id','sensor_name'),
		array('empty'=>'--please select--',
		'onChange'=>'reload(this.form)',
		'options' => array($model->sensor_id=>array('selected'=>true))
		)); ?>
		<?php //echo $form->error($model,'sensorList'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'measuringUnitList'); ?>
		<?php echo $form->dropDownList($model,'measuringUnitList', CHtml::listData(diUnits::model()->
			with(array(
				'fSensorTypes'=>array(
					// we don't want to select posts
					'select'=>false,
					// but want to get only users with published posts
					'joinType'=>'INNER JOIN',
					'condition'=>'"fSensorTypes".sensor_id='.$model->sensor_id,
				),
			))->findAll(),'unit_id','unit_name')		
		,
		array('empty'=>'--please select--')); ?>
		<?php //echo $form->error($model,'measuringUnitList'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'criticalValue'); ?>
		<?php echo $form->textField($model,'criticalValue'); ?>
		<?php //echo $form->error($model,'criticalValue'); ?>
	</div>
	
	<div class="row">	
        <?php echo $form->labelEx($model, 'criteriaType'); ?>
        <div class="compactRadioGroup">
            <?php
                echo $form->radioButtonList($model, 'criteriaType',
                    array(  0 => 'above',
                            1 => 'below',
                        ),   array( 'separator' => "  " ) );
            ?>
        </div>
        <?php //echo $form->error($model, 'criteriaType'); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'resendingInterval'); ?>
		<?php echo $form->textField($model,'resendingInterval'); ?>
		<?php //echo $form->error($model,'resendingInterval'); ?>
	</div>
	
	<?php if ($model->notificationType==2) : ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php //echo $form->error($model,'email'); ?>
	</div>
	
	<?php endif; ?>
	
	<?php if ($model->notificationType==1) : ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'phoneNumber'); ?>
		<?php echo $form->textField($model,'phoneNumber'); ?>
		<?php //echo $form->error($model,'phoneNumber'); ?>
	</div>
	
	<?php endif; ?>
	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>