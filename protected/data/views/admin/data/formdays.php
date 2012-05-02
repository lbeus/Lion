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
			<br /><br /><br /><br>
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
		<div id="content">
	<h3>Add days</h3>

<?php echo form_open('admin_days/action', 'class="crud"'); ?>

	<div class="tabs">

		<ul class="tab-menu">
			<li><a href="#unit-details-tab"><span>Details</span></a></li>   
		</ul>

		<!-- Content tab -->
		<div id="unit-details-tab">
			<fieldset>
				<ol>
                	<li>
						<label>Start date</label>
					</li>
					<li class="even">
						<label>Day</label>
						<?php echo form_input('startDay', $dates->startDay);?>
                        <span class="required-icon tooltip">required</span>
                    </li>
					<li class="even">
						<label>Month</label>
						<?php 	echo form_input('startMonth', $dates->startMonth);?>
                        <span class="required-icon tooltip">required</span>
                    </li>
					<li class="even">
						<label>Year</label>
						<?php 	echo form_input('startYear', $dates->startYear); ?>
						<span class="required-icon tooltip">required</span>
					</li>
					<li>
						<label>End date</label>
					</li>
					<li class="even">
						<label>Day</label>
                        <?php 	echo form_input('endDay', $dates->endDay);?>
                        <span class="required-icon tooltip">required</span>
                    </li>
					<li class="even">
						<label>Month</label>
						<?php 	echo form_input('endMonth', $dates->endMonth);?>
                        <span class="required-icon tooltip">required</span>
                    </li>
					<li class="even">
						<label>Year</label>
						<?php 	echo form_input('endYear', $dates->endYear); ?>
						<span class="required-icon tooltip">required</span>
					</li>
				</ol>
			</fieldset>
		</div>	
	</div> <br />
	

	<div class="buttons float-right padding-top" align="right">
		<button type="submit" name="btnAction" value="save" class="button">
			<span>Add</span>
		</button>
		<button type="submit" name="btnAction" value="cancel" class="button">
			<span>Cancel</span>
		</button>
	</div>

<?php echo form_close(); ?>			 
		</div>
	</section>
</div>
</body>
</html>