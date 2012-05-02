<h5> GSN requests </h5>
<?php if (!empty($gsn)): ?>
	<?php echo form_open('admin_gsn/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
                                        <th>gsnname</th>					
                                        <th>username</th>                                        
					<th>email</th>						
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
						<td class="align-center"><?php echo form_checkbox('action_to[]', $member->gsnprivilegecode); ?></td>
                                                <td><?php echo $member->gsnName; ?></td>				  		
                                                <td><?php echo $member->username; ?></td>
                                                <td><?php echo $member->email; ?></td>						                                                                                                                                                                               	
						<td class="align-center buttons buttons-small">							
                                                 <?php echo anchor('admin_gsn/approverequest/' . $member->gsnprivilegecode, 'Approve' ); ?>        
                                                 <?php echo anchor('admin_gsn/disapproverequest/' . $member->gsnprivilegecode, 'Dispprove' ); ?>        

						</td>						
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<div class="buttons float-right padding-top" align="right">
		<button type="submit" name="btnAction" value="approve">
			<span>Approve</span>
		</button>
	</div>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php echo img('/images/user.png'); ?>
		<h2>There are no GSN requests </h2>
	</div>
<?php endif; ?>
