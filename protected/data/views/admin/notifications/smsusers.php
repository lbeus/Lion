<?php if (!empty($requests)): ?> <h5> SMS users </h5>
	<?php echo form_open('admin_gsn/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>                                        
                                        <th>username</th>                                        
					<th>email</th>
                                        <th>Sensor</th>
                                        <th>Approved Date</th>	
                                        <th>Critical Value</th>
                                        <th>Resending Interval</th>
                                        <th>Active</th>   
                                        <th>Action</th>
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
				<?php foreach ($requests as $member): ?>
					<tr>                                        
                                                <td><?php echo $member->username; ?></td>
                                                <td><?php echo $member->email; ?></td> 
                                                <td><?php echo $member->sensorname; ?></td> 
                                                <td><?php echo date('M j, Y', $member->timenotificationapproved); ?></td>  
                                                <td><?php echo $member->critical_value; ?></td>
                                                <td><?php echo $member->resending_interval; ?></td>
                                                <td><?php echo $member->active ? 'Yes' : 'No'; ?></td>                                                
                                                <td class="align-center buttons buttons-small">							                                                
                                                 <?php    echo anchor('admin_notifications/DisapproveSMS1/' . $member->notificationid .'/'.$member->xmlname, 'Disapprove' ); ?>        
						</td>						
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php // echo img('/images/user.png'); ?>
		<h2>There are no SMS users </h2>
	</div>
<?php endif; ?>
