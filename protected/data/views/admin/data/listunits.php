<?php if (!empty($units)): ?>
	<?php echo form_open('admin_units/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
					<th>Name</th>
					<th>Mark</th>
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
				<?php foreach ($units as $unit): ?>
					<tr>
						<td class="align-center"><?php echo form_checkbox('action_to[]', $unit->unitCode); ?></td>
						<td><?php echo $unit->unitName; ?></td>
						<td><?php echo $unit->unitMark; ?></td>
						<td class="align-center buttons buttons-small">
							<?php echo anchor('admin_units/edit/' . $unit->unitCode, 'Edit', array('class'=>'edit-icon')); ?>
							<?php echo anchor('admin_units/deleteUnits/' . $unit->unitCode, 'Delete', array('class'=>'confirm delete-icon')); ?>
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
		<h2>There are no registered users</h2>
	</div>
<?php endif; ?>
