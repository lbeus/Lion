<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_part_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->day_part_id), array('view', 'id'=>$data->day_part_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_part_name')); ?>:</b>
	<?php echo CHtml::encode($data->day_part_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finish_time')); ?>:</b>
	<?php echo CHtml::encode($data->finish_time); ?>
	<br />


</div>