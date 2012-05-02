<?php
$this->pageTitle = Yii::app()->name . ' - Notifications';
$this->breadcrumbs = array(
    'Notification',
);
?>
<div class="post">
    <p class="date"><?php echo date("M"); ?><b><?php echo date("j"); ?></b></p>
    <h2 class="title">New notification</h2>
    <p class="posted">Lion development team</p>
    <div class="entry">
	<p>Fill in the form with data for your new notification</p>
	<div class="form">
	    <?php
	    $form = $this->beginWidget('CActiveForm', array(
			'id' => 'notification-form',
			'enableClientValidation' => true,
			//'enableAjaxValidation' => true,
			'clientOptions' => array(
			    'validateOnSubmit' => true,
			),
		    ));
	    ?>
	    <p class="note">Fields with <span class="required">*</span> are required.</p>
	    <?php echo $form->errorSummary($model); ?>

	    <h3>Notification information</h3>
	    <div class="row">
		<?php echo $form->labelEx($model, 'notification_type'); ?>
		<div class="compactRadioGroup">
		    <?php
		    echo $form->radioButtonList($model, 'notification_type',
			    array(1 => 'SMS',
				2 => 'E-mail',
			    ), array('separator' => "  ",
			'onChange' => 'reload(this.form)',
			'uncheckValue' => null,
			    // 'onChange'=>CHtml::ajax(array('type'=>'POST', 'url'=>CController::createUrl('dynamicRecipients'),'update'=>'#recipients', ))
		    ));
		    ?>
		</div>
		<?php echo $form->error($model, 'notification_type'); ?>
    	    </div>


    	    <div class="row">
		<?php echo $form->labelEx($model, 'criteria_type'); ?>
    		<div class="compactRadioGroup">
		    <?php
		    echo $form->radioButtonList($model, 'criteria_type',
			    array(0 => 'above',
				1 => 'below',
			    ), array('separator' => "  ", 'uncheckValue' => null));
		    ?>
		</div>
		<?php echo $form->error($model, 'criteria_type'); ?>
    	    </div>

    	    <div class="row">
		<?php echo $form->labelEx($model, 'critical_value'); ?>
		<?php $model->critical_value = (isset($_GET['critical_value']) ? $_GET['critical_value'] : null);
		    echo $form->textField($model, 'critical_value'); ?>
		<?php echo $form->error($model, 'critical_value'); ?>
    	    </div>
    	    <div class="row">
		<?php echo $form->labelEx($model, 'resending_interval'); ?>
		<?php $model->resending_interval = (isset($_GET['resending_interval']) ? $_GET['resending_interval'] : null);
		    echo $form->textField($model, 'resending_interval'); ?>
		<?php echo $form->error($model, 'resending_interval'); ?>
    	    </div>

    	    <h3>Sensor information</h3>
    	    <div class="row">
		<?php echo $form->labelEx($model, 'gsn_list'); ?>
		<?php
		    $gsn_order = new CDbCriteria;
		    $gsn_order->order = 'gsn_name ASC';


		    echo $form->dropDownList($model, 'gsn_list', CHtml::listData(DiGsn::model()->with(array('diGsnPrivileges' => array('select' => false, 'joinType' => 'INNER JOIN', 'condition' => '"diGsnPrivileges".user_id = ' . Yii::app()->user->id)))->findAll($gsn_order), 'gsn_id', 'gsn_name'),
			    array(
				'empty' => 'Select',
				'ajax' => array(
				    'type' => 'POST',
				    'url' => CController::createUrl('user/notificationsDynamicSensors'),
				    'update' => '#UserNotifications_' . 'sensor_list'
				)
			    )
		    );
		?>

		<?php echo $form->error($model, 'gsn_list'); ?>
    	    </div>

    	    <div class="row">
		<?php echo $form->labelEx($model, 'sensor_list'); ?>
		<?php
		    $sensor_order = new CDbCriteria;
		    $sensor_order->order = 'sensor_name ASC';
		    echo $form->dropDownList($model, 'sensor_list', array(), //CHtml::listData(DiSensors::model()->findAll($sensor_order),'sensor_id','sensor_user_name'),
			    array(
				'empty' => 'Select',
				'ajax' => array(
				    'type' => 'POST',
				    'url' => CController::createUrl('user/notificationsDynamicUnits'),
				    'update' => '#UserNotifications_' . 'measuring_unit_list'
				)
			    )
		    );
		?>
		<?php echo $form->error($model, 'sensor_list'); ?>
    	    </div>

    	    <div class="row">
		<?php echo $form->labelEx($model, 'measuring_unit_list'); ?>
		<?php
		    /*
		      echo $form->dropDownList($model, 'measuring_unit_list', CHtml::listData(DiUnits::model()->
		      with(array(
		      'fSensorTypes' => array(
		      'select' => false,
		      'joinType' => 'INNER JOIN',
		      'condition' => '"fSensorTypes".sensor_id=' . $model->sensor_id,
		      ),
		      ))->findAll(), 'unit_id', 'unit_name'),
		      array('empty' => '--please select--',
		      'options' => array($model->unit_id => array('selected' => true))
		      )); */
		    //ovo ranije smo maknuli radi probe neceg pametnijeg
		    echo $form->dropDownList($model, 'measuring_unit_list', array(),
			    array(
				'empty' => 'Select',));
		?>
		<?php echo $form->error($model, 'measuring_unit_list'); ?>
    	    </div>

    	    <h3>Recipients</h3>
	    <?php //$this->renderPartial('_notification_recipients', array('model'=> $model,'form'=>$form));   ?>
	    <?php if ($model->notification_type == 2) : ?>

	    	    <div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<?php echo $form->textField($model, 'email'); ?>
		<?php //echo $form->error($model,'email'); ?>
		    </div>

	    <?php endif; ?>

	    <?php if ($model->notification_type == 1) : ?>
			    <div class="row">
		<?php echo $form->labelEx($model, 'phone_number'); ?>
		<?php echo $form->textField($model, 'phone_number'); ?>
		<?php //echo $form->error($model,'phone_number');  ?>
	    	    </div>
	    <?php endif; ?>



	    <?php if (CCaptcha::checkRequirements()): ?>
		    	    <div class="row">
		<?php echo $form->labelEx($model, 'verify_code'); ?>
				<div>
		    <?php $this->widget('CCaptcha'); ?>
		    <?php echo $form->textField($model, 'verify_code'); ?>
	    		</div>
	    		<div class="hint">Please enter the letters as they are shown in the image above.
	    		    <br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model, 'verify_code'); ?>
			    </div>
			    <div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
			    </div>
	    <?php endif; ?>

	    <?php $this->endWidget(); ?>

	</div><!-- form -->
    </div>
</div>