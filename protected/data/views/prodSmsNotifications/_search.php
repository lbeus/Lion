<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'notification_id'); ?>
		<?php echo $form->textField($model,'notification_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_notification_asked'); ?>
		<?php echo $form->textField($model,'time_notification_asked'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_notification_approved'); ?>
		<?php echo $form->textField($model,'time_notification_approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_id'); ?>
		<?php echo $form->textField($model,'unit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_id'); ?>
		<?php echo $form->textField($model,'sensor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prod_user_id'); ?>
		<?php echo $form->textField($model,'prod_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_name'); ?>
		<?php echo $form->textField($model,'unit_name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_name_upper'); ?>
		<?php echo $form->textField($model,'unit_name_upper',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sensor_name'); ?>
		<?php echo $form->textField($model,'sensor_name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'xml_name'); ?>
		<?php echo $form->textField($model,'xml_name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'critical_value'); ?>
		<?php echo $form->textField($model,'critical_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resending_interval'); ?>
		<?php echo $form->textField($model,'resending_interval'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->