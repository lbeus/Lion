<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prod-sms-notifications-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'time_notification_asked'); ?>
		<?php echo $form->textField($model,'time_notification_asked'); ?>
		<?php echo $form->error($model,'time_notification_asked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_notification_approved'); ?>
		<?php echo $form->textField($model,'time_notification_approved'); ?>
		<?php echo $form->error($model,'time_notification_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_id'); ?>
		<?php echo $form->textField($model,'unit_id'); ?>
		<?php echo $form->error($model,'unit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
		<?php echo $form->error($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_user_id'); ?>
		<?php echo $form->textField($model,'prod_user_id'); ?>
		<?php echo $form->error($model,'prod_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_name'); ?>
		<?php echo $form->textField($model,'unit_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'unit_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_name_upper'); ?>
		<?php echo $form->textField($model,'unit_name_upper',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'unit_name_upper'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sensor_name'); ?>
		<?php echo $form->textField($model,'sensor_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'sensor_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'xml_name'); ?>
		<?php echo $form->textField($model,'xml_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'xml_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'critical_value'); ?>
		<?php echo $form->textField($model,'critical_value'); ?>
		<?php echo $form->error($model,'critical_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resending_interval'); ?>
		<?php echo $form->textField($model,'resending_interval'); ?>
		<?php echo $form->error($model,'resending_interval'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->