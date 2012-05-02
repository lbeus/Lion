<?php if (!empty($sensors)): ?>
	<?php echo form_open('admin_sensors/action'); ?>
    <h4>GSN Server: <?php echo form_dropdown('gsnCode', $gsn_select, $gsnCode , 'id=gsnCode');
		?></h4>
    
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
					<th>Name</th>
					<th>Type</th>
					<th>Activated</th>
					<th>Deactivated</th>
					<th>Active</th>
					<th>Dummy</th>
					<th>Real</th>
					<th width="200" class="align-center">Actions</th>
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
						<td class="align-center"><?php echo form_checkbox('action_to[]', $sensor->sensorCode); ?></td>
						<td><?php echo $sensor->sensorUserName; ?></td>
						<td><?php echo $sensor->sensorType; ?></td>
                        
                        <td><?php echo $sensor->dateActivatedId//date('M j, Y', $sensor->dateActivatedId); ?></td>
                        <td><?php echo $sensor->dateDeactivatedId//date('M j, Y', $sensor->dateDeactivatedId); ?></td>
						<td><?php echo $sensor->isActive ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $sensor->isDummy ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $sensor->isRealSensor ? 'Yes' : 'No'; ?></td>
						<td class="align-center buttons buttons-small">
							<?php echo anchor('admin_sensors/view/' . $sensor->sensorCode, 'View', array('class'=>'edit-icon')); ?>
						</td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php echo img('/images/user.png'); ?>
		<h2>There are no registered sensors</h2>
	</div>
<?php endif; ?>

<script>

jQuery(function($) {
  
   $("#gsnCode").change(function () {
		$("#gsnName").val($("#gsnCode option:selected").text());
		var url = "<?php echo BASE_URL; ?>" + "index.php/admin_sensors/sensors/" + $(this).val();
		window.location = url;
   });	
});

</script>
