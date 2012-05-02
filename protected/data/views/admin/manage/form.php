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
	<h3>Add user</h3>

<?php else: ?>
	<h3>Edit "<?php if ($this->router->method == 'editadmin') {
                    echo 'Admin'. ' profile';
        } else
               echo $member->firstName.' '.$member->lastName;?>"</h3>
<?php endif; ?>

<?php echo form_open($this->uri->uri_string(), 'class="crud"'); ?>

	<div class="tabs">

		<ul class="tab-menu">
			<li><a href="#user-details-tab"><span>Details</span></a></li>
			<li><a href="#user-password-tab"><span>Password</span></a></li>
		</ul>

		<!-- Content tab -->
		<div id="user-details-tab">
			<fieldset>
				<ol>
					<li class="even">
						<label>First Name</label>
						<?php echo form_input('firstName', $member->firstName); ?>
						<span class="required-icon tooltip">required</span>
					</li>

					<li>
						<label>Last Name</label>
						<?php echo form_input('lastName', $member->lastName); ?>
					</li>

					<li class="even">
						<label>Email</label>
						<?php echo form_input('email', $member->email); ?>
						<span class="required-icon tooltip">required</span>
					</li>
					
					<li>
						<label>Phone</label>
						<?php echo form_input('phone', $member->phone); ?>
						<span class="required-icon tooltip">required</span>
					</li>
					
					<li class="even">
						<label>Username</label>
						<?php echo form_input('username', $member->username); ?>
						<span class="required-icon tooltip">required</span>
					</li>
					
					<li>    <?php if ($this->router->method != 'editadmin') {  ?>
						<label>Active</label>
						<?php echo form_checkbox('active', 1, (isset($member->active) && $member->active == 1)); ?>
                                                <?php } ?> 
					</li>
				</ol>
			</fieldset>
		</div>

		<div id="user-password-tab">
			<fieldset>
				<ol>
					<li class="even">
						<label>Password</label>
						<?php echo form_password('password'); ?>
						<?php if ($this->router->method == 'create'): ?>
						<span class="required-icon tooltip"></span>
						<?php endif; ?>
					</li>

					<li>
						<label>Confirm Password</label>
						<?php echo form_password('confirm_password'); ?>
						<?php if ($this->router->method == 'create'): ?>
						<span class="required-icon tooltip"></span>
						<?php endif; ?>
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

<script type="text/javascript">
(function ($) {
	$(function(){
		$('input[name="password"], input[name="confirm_password"]').val('');
	});
})(jQuery);
</script>