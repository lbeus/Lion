<h5> GSN users </h5>
<?php if (!empty($gsn)): ?>
	<?php echo form_open('admin_gsn/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>	                                        
                                        <th>gsnname</th>					
                                        <th>username</th>                                        
					<th>email</th>						
                                        <th>Active</th>						
                                        <th>Timepriviliged</th>   
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
				<?php foreach ($gsn as $member): ?>
					<tr>	
                                                <td><?php echo $member->gsnName; ?></td>				  		
                                                <td><?php echo $member->username; ?></td>
                                                <td><?php echo $member->email; ?></td> 
                                                <td><?php echo $member->isactive ? 'Yes' : 'No'; ?></td>
                                                <td><?php echo $member->timeprivilegegiven; ?></td> 
                                                <td class="align-center buttons buttons-small">							                                                
                                                 <?php echo anchor('admin_gsn/disapproverequest/' . $member->gsnprivilegecode, 'Dispprove' ); ?>      
						</td>						
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php echo img('/images/user.png'); ?>
		<h2>There are no GSN users </h2>
	</div>
<?php endif; ?>
