<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'gsn_id'); ?>
		<?php echo $form->textField($model,'gsn_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gsn_name'); ?>
		<?php echo $form->textField($model,'gsn_name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gsn_url'); ?>
		<?php echo $form->textField($model,'gsn_url',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_change'); ?>
		<?php echo $form->textField($model,'last_change'); ?>
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
		<?php echo $form->label($model,'date_activated_id'); ?>
		<?php echo $form->textField($model,'date_activated_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_deactivated_id'); ?>
		<?php echo $form->textField($model,'date_deactivated_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active_privilege'); ?>
		<?php echo $form->textField($model,'is_active_privilege'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gsn_ip'); ?>
		<?php echo $form->textField($model,'gsn_ip',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gsn_port'); ?>
		<?php echo $form->textField($model,'gsn_port'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'port_ssl'); ?>
		<?php echo $form->textField($model,'port_ssl'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->