<?php if (!empty($gsn)): ?>
	<?php echo form_open('admin_gsn/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
					<th>Gsn</th>
					<th>username</th>
					<th>URL</th>
					<th>city</th>
					<th>state</th>
					<th>lastchanged</th>
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
				<?php foreach ($gsn as $member): ?>
					<tr>
						<td class="align-center"><?php echo form_checkbox('action_to[]', $member->gsnCode); ?></td>
				  		<td><?php echo $member->gsnName; ?></td>
                                                <td><?php echo $member->username; ?></td>
						<td><?php echo $member->gsnUrl; ?></td>
                                                <td><?php echo $member->city; ?></td>
						<td><?php echo $member->state; ?></td>
						<td><?php echo $member->lastChange; ?></td>
						<td><?php echo $member->isActive ? 'Yes' : 'No'; ?></td> 
                                                                                                                                	
						<td class="align-center buttons buttons-small">							
                                                        <?php echo anchor('admin_gsn/edit/' . $member->gsnCode, 'Edit', array('class'=>'edit-icon')); ?>
							<?php echo anchor('admin_gsn/deletegsn/' . $member->gsnCode, 'Delete', array('class'=>'confirm delete-icon')); ?>
						</td>						
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<div class="buttons float-right padding-top" align="right">
		<button type="submit" name="btnAction" value="delete" class="button confirm">
			<span>Delete</span>
		</button>
	</div>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php echo img('/images/user.png'); ?>
		<h2>There are no GSNs registered </h2>
	</div>
<?php endif; ?>
