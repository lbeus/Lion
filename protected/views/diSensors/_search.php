<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_name'); ?>
		<?php echo $form->textField($model,'sensor_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_user_name'); ?>
		<?php echo $form->textField($model,'sensor_user_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gsn_id'); ?>
		<?php echo $form->textField($model,'gsn_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_type'); ?>
		<?php echo $form->textField($model,'sensor_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_x'); ?>
		<?php echo $form->textField($model,'location_x'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_y'); ?>
		<?php echo $form->textField($model,'location_y'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_activated_id'); ?>
		<?php echo $form->textField($model,'date_activated_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_deactivated_id'); ?>
		<?php echo $form->textField($model,'date_deactivated_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_dummy'); ?>
		<?php echo $form->textField($model,'is_dummy',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_real_sensor'); ?>
		<?php echo $form->textField($model,'is_real_sensor',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->