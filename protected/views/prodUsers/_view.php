<div class="roundedBox" id="type1">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />	

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group_id); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />	

	<?php /*
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo CHtml::encode($data->salt); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->ip_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activation_code')); ?>:</b>
	<?php echo CHtml::encode($data->activation_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forgotten_password_code')); ?>:</b>
	<?php echo CHtml::encode($data->forgotten_password_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remember_code')); ?>:</b>
	<?php echo CHtml::encode($data->remember_code); ?>
	<br />


	*/ ?>

    <div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div>
</div>