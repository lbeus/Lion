<?php if (!empty($days)): ?>
	<?php echo form_open('admin_days/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th>Month</th>
					<th>Day</th>
                    <th>Year</th>
                    <th>Quartal</th>
					<th>Week</th>
                    <th>Day Of The Year</th>
                    <th>Day Name</th>
					<th>Day Name Short</th>
                    <th>Month Name</th>
                    <th>Mont Name Short</th>
					<th>Days In Month</th>
                    <th>Season</th>
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
				<?php foreach ($days as $day): ?>
					<tr>
						<td><?php echo $day->month; ?></td>
						<td><?php echo $day->day; ?></td>
                        <td><?php echo $day->year; ?></td>
                        <td><?php echo $day->quartal; ?></td>
						<td><?php echo $day->weekoftheyear; ?></td>
                        <td><?php echo $day->dayoftheyear; ?></td>
                        <td><?php echo $day->nameday; ?></td>
						<td><?php echo $day->namedayshort; ?></td>
                        <td><?php echo $day->namemonth; ?></td>
                        <td><?php echo $day->namemonthshort; ?></td>
						<td><?php echo $day->daysinmonth; ?></td>
                        <td><?php echo $day->season; ?></td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<?php echo img('/images/user.png'); ?>
		<h2>There are no registered users</h2>
	</div>
<?php endif; ?>
