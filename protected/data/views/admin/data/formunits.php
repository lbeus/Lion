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
			<?php if ($this->router->method == 'create'): ?>
	<h3>Add unit</h3>

<?php else: ?>
	<h3>Edit "<?php echo $unit->unitName;?>"</h3>
<?php endif; ?>

<?php echo form_open($this->uri->uri_string(), 'class="crud"');;?>

	<div class="tabs">

		<ul class="tab-menu">
			<li><a href="#unit-details-tab"><span>Details</span></a></li>   
		</ul>

		<!-- Content tab -->
		<div id="unit-details-tab">
			<fieldset>
				<ol>
					<li class="even">
						<label>Unit Name</label>
						<?php echo form_input('unitName', $unit->unitName); ?>
						<span class="required-icon tooltip">required</span>
					</li>

					<li>
						<label>Unit Mark</label>
						<?php echo form_input('unitMark', $unit->unitMark); ?>
                        <span class="required-icon tooltip">required</span>
					</li>
				</ol>
			</fieldset>
		</div>	
	</div> <br />
	

	<div class="buttons float-right padding-top" align="right">
    <?php if ($this->router->method == 'create'): ?>
	<button type="submit" name="btnAction" value="save" class="button">
			<span>Save</span>
		</button>
<?php else: ?>
	<button type="submit" name="btnAction" value="save" class="button">
			<span>Update</span>
		</button>
<?php endif; ?>
		
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