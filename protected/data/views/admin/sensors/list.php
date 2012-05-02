<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to Cold Watch System</title>
<?php echo $metadata; ?>
</head>
<body>
	<?php echo $header; ?>
    <div id="CenterFrame">
    	<?php if (!empty($sensors)): ?>
	<?php echo form_open('admin/action'); ?>
		<div id="TableContainer">
  <table id="rounded-corner" summary="Sensors Information">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-sensor">Sensor Name</th>
            <th scope="col" class="rounded-type">Type</th>
            <th scope="col" class="rounded-Active">Active</th>
            <th scope="col" class="rounded-GSN">GSN Network</th>
            <th scope="col" class="rounded-actions">Actions</th>
           
       </tr>
    </thead>
    <tfoot>
      <tr>
		<td colspan="8">
		  <div class="inner">
			<?php if(!empty($pagination['links'])): ?>
					<div class="paginate">
			    		<?php echo $pagination['links'];?>
					</div>
			<?php endif; ?>
		  </div>
		</td>
	 </tr>	
    </tfoot>
    <tbody>
      <?php foreach ($sensors as $sensor): ?>
		     <tr>
				<!--<td class="align-center"><?php //echo form_checkbox('action_to[]', $gsn->id); ?></td>-->
				<td><?php echo $sensor->sensorName; ?></td>
				<td><?php echo $sensor->sensorType; ?></td>
				<!--<td><?php //echo $sensor->state; ?></td>
				<td><?php //echo $gsn->gsnUrl; ?></td>-->
				<td><?php echo $sensor->isActive ? 'Yes' : 'No'; ?></td>
		        <td><?php echo $sensor->gsnName; ?></td>
			<!--	<td><?php //echo ($gsn->lastLogin > 0 ? date('M j, Y', $gsn->lastLogin) : 'Never'); ?></td>  -->
				<td>
					<?php 
						 if($privillage)
						 {	
							if(isset($privillage[$sensor->sensorCode]) && $privillage[$sensor->sensorCode] == 1) {
								echo 'Access Allow';  
							 }
							 else if(isset($privillage[$sensor->sensorCode]) && $privillage[$sensor->sensorCode] == 0) {
									echo 'Waiting for approval';
							 }
							 else {
									echo anchor('gsn/accessSensor/' . $sensor->sensorCode, 'Request'); 
							 }
						  } 
						  else {
							  	 echo anchor('gsn/accessSensor/' . $sensor->sensorCode, 'Request');
						  }	?>
							<?php //echo anchor('admin/deleteUsers/' . $gsn->id, 'Delete', array('class'=>'confirm delete-icon')); ?>
					</td>
				</tr>
		<?php endforeach; ?>
    </tbody>
</table>


</div>
 	<?php else: ?>
	<div class="blank-slate">
		<?php //echo img('/images/user.png'); ?>
		<h2>You do not have any Gsn previllage.</h2>
	</div>
<?php endif; ?>	
<?php echo form_close(); ?>


    </div>
	
</body>
</html>