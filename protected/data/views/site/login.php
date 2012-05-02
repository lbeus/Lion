<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p>Please fill out the following form with your login credentials:</p>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'login_username'); ?>
		<?php echo $form->textField($model,'login_username'); ?>
		<?php echo $form->error($model,'login_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_password'); ?>
		<?php echo $form->passwordField($model,'login_password'); ?>
		<?php echo $form->error($model,'login_password'); ?>
	</div>

	<div class="row login_remember">
		<?php echo $form->checkBox($model,'login_remember'); ?>
		<?php echo $form->label($model,'login_remember'); ?>
		<?php echo $form->error($model,'login_remember'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
<div class="span-12">
	 <p id="register_here">Not a member? <a href="<?php echo Yii::app()->request->baseUrl;?>">Register here!</a></p> 
</div>
	 </div><!-- form -->
