<?php if (!empty($users)): ?>
	<?php echo form_open('admin/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
					<th>Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Phone</th>
					<th>Role</th>
					<th>Active</th>
					<th>Joined</th>
					<th>Last Visited</th>
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
				<?php foreach ($users as $member): ?>
					<tr>
						<td class="align-center"><?php echo form_checkbox('action_to[]', $member->id); ?></td>
						<td><?php echo $member->firstName.' '.$member->lastName; ?></td>
						<td><?php echo mailto($member->email); ?></td>
						<td><?php echo $member->username; ?></td>
						<td><?php echo $member->phone; ?></td>
						<td><?php if ($member->groupId == 1) { ?> 
									 Administrator
							<?php } else {?>
									 User
							<?php }?> 
						</td>
						<td><?php echo $member->active ? 'Yes' : 'No'; ?></td>
						<td><?php echo date('M j, Y', $member->createdOn); ?></td>
						<td><?php echo ($member->lastLogin > 0 ? date('M j, Y', $member->lastLogin) : 'Never'); ?></td>
						<td class="align-center buttons buttons-small">
							<?php echo anchor('admin/edit/' . $member->id, 'Edit', array('class'=>'edit-icon')); ?>
							<?php echo anchor('admin/deleteUsers/' . $member->id, 'Delete', array('class'=>'confirm delete-icon')); ?>
						</td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	<div class="buttons float-right padding-top" align="right">
		<button type="submit" name="btnAction" value="enable" class="button">
			<span>Activate</span>
		</button>
		<button type="submit" name="btnAction" value="delete" class="button confirm">
			<span>Delete</span>
		</button>
	</div>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php echo img('/images/user.png'); ?>
		<h2>There are no registered users</h2>
	</div>
<?php endif; ?>
