<div class="roundedBox" id="type1">

    <b><?php echo CHtml::encode($data->getAttributeLabel('gsn_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->gsn_id), array('view', 'id' => $data->gsn_id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('gsn_name')); ?>:</b>
    <?php echo CHtml::encode($data->gsn_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('gsn_url')); ?>:</b>
    <?php echo CHtml::encode($data->gsn_url); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
    <?php echo CHtml::encode($data->city); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
    <?php echo CHtml::encode($data->state); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_change')); ?>:</b>
    <?php echo CHtml::encode($data->last_change); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
    <?php echo CHtml::encode($data->is_active); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('is_dummy')); ?>:</b>
      <?php echo CHtml::encode($data->is_dummy); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('date_activated_id')); ?>:</b>
      <?php echo CHtml::encode($data->date_activated_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('date_deactivated_id')); ?>:</b>
      <?php echo CHtml::encode($data->date_deactivated_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
      <?php echo CHtml::encode($data->username); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
      <?php echo CHtml::encode($data->password); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('gsn_ip')); ?>:</b>
      <?php echo CHtml::encode($data->gsn_ip); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('gsn_port')); ?>:</b>
      <?php echo CHtml::encode($data->gsn_port); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('port_ssl')); ?>:</b>
      <?php echo CHtml::encode($data->port_ssl); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('database_schema')); ?>:</b>
      <?php echo CHtml::encode($data->database_schema); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('database_user')); ?>:</b>
      <?php echo CHtml::encode($data->database_user); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('database_password')); ?>:</b>
      <?php echo CHtml::encode($data->database_password); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('database_port')); ?>:</b>
      <?php echo CHtml::encode($data->database_port); ?>
      <br />

     */ ?>

    <div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div>
</div>