<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'daily-reports-userDailyReportsSubscription-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
		<?php echo $form->error($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gsn_id'); ?>
		<?php echo $form->textField($model,'gsn_id'); ?>
		<?php echo $form->error($model,'gsn_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->