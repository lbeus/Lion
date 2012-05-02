<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to Cold Watch System</title>
<?php echo $metadata; ?>
</head>
<body>
<div id="page-wrapper">
	<section id="sidebar">
	<?php echo $header; ?>
	<?php echo $navigation; ?>
		<footer>
			Copyright &copy; 2011 Cold Watch<br />
			<br />
			Rendered in {elapsed_time} sec. using {memory_usage}.
		</footer>
	</section>
	<section id="content-wrapper">
		<header id="page-header"><h1>Welcome</h1></header>
		  <?php echo $shortcuts;?>
		  	<?php if (validation_errors()): ?>
				<div class="closable notification error">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php if (isset($error_string)): ?>
				<div class="closable notification error">
					<?php echo $error_string; ?>
				</div>
			<?php endif; ?>
            
		<div id="content"><h3>View "<?php echo $sensor->sensorUserName;?>"</h3></div>
<?php echo form_open('admin_sensors/action', 'class="crud"'); ?>

	<div class="tabs">

		<ul class="tab-menu">
			<li><a href="#user-details-tab"><span>Details</span></a></li>
		</ul>

		<!-- Content tab -->
		<div id="user-details-tab">
			<fieldset>
				<ol>
					<li class="even">
						<label>Name</label>
						<?php echo form_input('sensorUserName', $sensor->sensorUserName); ?>
						<span class="required-icon tooltip">required</span>
					</li>

					<li class="even">
						<label>Type</label>
						<?php echo form_input('sensorType', $sensor->sensorType); ?>
                        <span class="required-icon tooltip">required</span>
					</li>
					<li class="even">
						<label>Location x</label>
						<?php echo form_input('location_x', $sensor->location_x); ?>
						<span class="required-icon tooltip">required</span>
					</li>
					<li class="even">
						<label>Location y</label>
						<?php echo form_input('location_y', $sensor->location_y); ?>
						<span class="required-icon tooltip">required</span>
					</li>
					<li class="even">
						<label>Date activated</label>
						<?php echo form_input('dateActivatedId', $sensor->dateActivatedId); ?>
					</li>
					<li class="even">
						<label>Date deactivated</label>
						<?php echo form_input('dateDeactivatedId', $sensor->dateDeactivatedId); ?>
					</li>
			
					<li class="even">
						<label>Active</label>
						<?php echo form_checkbox('isActive', 1, (isset($sensor->isActive) && $sensor->isActive == 1)); ?>
                    </li>
                    <li class="even">
						<label>Dummy</label>
						<?php echo form_checkbox('isDummy', 1, (isset($sensor->isDummy) && $sensor->isDummy == 1)); ?>
					</li>
                    <li class="even">
						<label>Real</label>
						<?php echo form_checkbox('isRealSensor', 1, (isset($sensor->isRealSensor) && $sensor->isRealSensor == 1)); ?>
					</li>
				</ol>
			</fieldset>
		</div>
        
        	<div class="buttons float-right padding-top" align="right">
		<button type="submit" name="btnAction" value="back" class="button">
			<span>Back</span>
		</button>
	</div>

<?php echo form_close(); ?>			 
		</div>
	</section>
</div>
</body>
</html>