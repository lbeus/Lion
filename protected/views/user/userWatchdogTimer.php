<?php
$this->pageTitle = Yii::app()->name . ' - Watchdog timer';
$this->breadcrumbs = array(
    'Watchdog timer',
);
?>

<h1>New Watchdog timer</h1>

<?php if (Yii::app()->user->hasFlash('notification')): ?>

    <div class="flash-success">
    <?php echo Yii::app()->user->getFlash('notification'); ?>
</div>

<?php else: ?>

        <p>
            Fill in the form with data for your new watchdog timer
        </p>

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

    <?php
    echo $form->errorSummary($model); ?>

        <div class="span-7">
            <div id="content" style="padding-top: 0px; margin-top: 0px; border-right: 2px;">
                <h3>WatchdogTimer information</h3>
                <div class="row">
                <?php echo $form->labelEx($model, 'watchdog_type'); ?>
                <div class="compactRadioGroup">
                    <?php
                    echo $form->radioButtonList($model, 'watchdog_type',
                            array(1 => 'SMS',
                                2 => 'E-mail',
                            ), array('separator' => "  ",
                        'onChange' => 'reload(this.form)',
                        'uncheckValue' => null,
                            // 'onChange'=>CHtml::ajax(array('type'=>'POST', 'url'=>CController::createUrl('dynamicRecipients'),'update'=>'#recipients', ))
                    ));
                    ?>
                </div>
                <?php echo $form->error($model, 'watchdog_type'); ?>
                </div>

                <div class="row">
                <?php echo $form->labelEx($model, 'critical_period'); ?>
                <?php $model->critical_period = (isset($_GET['critical_period']) ? $_GET['critical_period'] : null);
                    echo $form->textField($model, 'critical_period'); ?>
                <?php echo $form->error($model, 'critical_period'); ?>
                </div>
                <div class="row">
                <?php echo $form->labelEx($model, 'minimal_delay_between_emails'); ?>
                <?php $model->minimal_delay_between_emails = (isset($_GET['minimal_delay_between_emails']) ? $_GET['minimal_delay_between_emails'] : null);
                    echo $form->textField($model, 'minimal_delay_between_emails'); ?>
                <?php echo $form->error($model, 'minimal_delay_between_emails'); ?>
                </div>

            </div>
        </div>

        <div class="span-7">
            <div id="content" style="padding-top: 0px; margin-top: 0px; border: 2px;"></div>
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

            <div class="span-7">
                <div id="content" style="padding-top: 0px; margin-top: 0px; border-left: 2px">

                    <h3>Recipients</h3>
            <?php //$this->renderPartial('_notification_recipients', array('model'=> $model,'form'=>$form));  ?>
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
                            </div>
                        </div>

    <?php $this->endWidget(); ?>

                            </div><!-- form -->      
<?php endif; ?>
