<?php if (!empty($requests)): ?> <h5>Email requests </h5>
	<?php echo form_open('admin_gsn/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th>Name</th>
                    <th>Username</th>
					<th>Email</th>
                    <th>Sensor</th>
					<th>Unit Name</th>
					<th>Requested Date</th>
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
				<?php foreach ($requests as $request): ?>
					<tr>
				  		<td><?php echo $request->firstName.' '.$request->lastName; ?></td>
                        <td><?php echo $request->username; ?></td>
						<td><?php echo $request->email; ?></td>
                        <td><?php echo $request->sensorname; ?></td>
						<td><?php echo $request->unitname; ?></td>
						<td><?php echo date('M j, Y', $request->timenotificationasked); ?></td>
                                                <td><?php echo $request->critical_value; ?></td>
                                                <td><?php echo $request->resending_interval; ?></td>
						<td><?php echo $request->active ? 'Yes' : 'No'; ?></td> 
                        <td class="align-center buttons buttons-small">	                                                    
                           <?php echo $request->isactive ? 'Approved' : anchor('admin_notifications/approvedEmail/' . $request->notificationid .'/'.$request->xmlname, 'Approve', 'Approved'); ?>
                           <?php  echo anchor('admin_notifications/DisapproveEmail/' . $request->notificationid, 'Disapprove' ); ?>        
							<?php //echo anchor('admin_gsn/deletegsn/' . $request->gsnCode, 'Delete', array('class'=>'confirm delete-icon')); ?>
						</td>						
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<!--<div class="buttons float-right padding-top" align="right">
		<button type="submit" name="btnAction" value="delete" class="button confirm">
			<span>Delete</span>
		</button>
	</div>-->
        
<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php //echo img('/images/user.png'); ?>
		<h2>There are no Email requests  </h2>
	</div>
<?php endif; ?>
