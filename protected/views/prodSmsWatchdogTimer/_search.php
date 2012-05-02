<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'watchdog_id'); ?>
		<?php echo $form->textField($model,'watchdog_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_watchdog_asked'); ?>
		<?php echo $form->textField($model,'time_watchdog_asked'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_watchdog_approved'); ?>
		<?php echo $form->textField($model,'time_watchdog_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_name'); ?>
		<?php echo $form->textField($model,'sensor_name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'xml_name'); ?>
		<?php echo $form->textField($model,'xml_name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'critical_period'); ?>
		<?php echo $form->textField($model,'critical_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_script'); ?>
		<?php echo $form->textField($model,'period_script'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minimal_delay_between_emails'); ?>
		<?php echo $form->textField($model,'minimal_delay_between_emails'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->