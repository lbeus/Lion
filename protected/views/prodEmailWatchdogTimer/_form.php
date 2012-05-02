<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prod-email-watchdog-timer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'time_watchdog_asked'); ?>
		<?php echo $form->textField($model,'time_watchdog_asked'); ?>
		<?php echo $form->error($model,'time_watchdog_asked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_watchdog_approved'); ?>
		<?php echo $form->textField($model,'time_watchdog_approved'); ?>
		<?php echo $form->error($model,'time_watchdog_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
		<?php echo $form->error($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
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
		<?php echo $form->labelEx($model,'critical_period'); ?>
		<?php echo $form->textField($model,'critical_period'); ?>
		<?php echo $form->error($model,'critical_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_script'); ?>
		<?php echo $form->textField($model,'period_script'); ?>
		<?php echo $form->error($model,'period_script'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minimal_delay_between_emails'); ?>
		<?php echo $form->textField($model,'minimal_delay_between_emails'); ?>
		<?php echo $form->error($model,'minimal_delay_between_emails'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->