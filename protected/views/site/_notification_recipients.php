<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (empty($model->notification_type))
        $model->notification_type = ((int) !empty($_POST['NotificationsForm']['notification_type']) ? $_POST['NotificationsForm']['notification_type'] : ((int) !empty($_GET['notification_type']) ? $_GET['notification_type'] : 99999));


echo "current_notification_type: ".$model->notification_type;

?>

    <?php
        $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'notification-form',
                    'enableClientValidation' => true,
            'enableAjaxValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));

 if ($model->notification_type == 2) : ?>
 
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

<?php //$this->endWidget(); ?>