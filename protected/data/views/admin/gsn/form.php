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
	<h3>Add GSN</h3>

<?php else: ?>
	<h3>Edit "<?php echo $gsn->gsnName.' '.$gsn->username;?>"</h3>
<?php endif; ?>

<?php echo form_open($this->uri->uri_string(), 'class="crud"'); ?>

	<div class="tabs">

		<ul class="tab-menu">
			<li><a href="#user-details-tab"><span>Details</span></a></li>
			
		</ul>

		<!-- Content tab -->
		<div id="user-details-tab">
			<fieldset>
				<ol>
					<li class="even">
						<label>GSN Name</label>
						<?php echo form_input('gsnName', $gsn->gsnName); ?>
						<span class="required-icon tooltip">required</span>
					</li>

			                                        
                                        <li>
						<label>username</label>
						<?php echo form_input('username', $gsn->username); ?>
                                                <span class="required-icon tooltip">required</span>                                                
                
					

                                        <?php if ($this->router->method == 'edit') { ?>
                                               
                                       <button id="editpassword" type="button" value="change" class="button">  <span>Change password</span>  </button>
                                               
                                       </li>
                                       <?php } ?> 
					<div id="edit_pass" style="display:none">

                                      <li class="even">
                                                  <label>password</label>
                                                  <?php echo form_password('password'); ?>
                                                  <?php if ($this->router->method == 'create'): ?>
                                                  <span class="required-icon tooltip"></span>
                                                  <?php endif; ?>
                            
                                      </li>    
                                            <?php if ($this->router->method == 'edit') { ?>
                                            
                                            <?php } ?> 
                                      <li>
                                                <label>Confirm Password</label>
                                                <?php echo form_password('confirm_password'); ?>
                                                <?php if ($this->router->method == 'create'): ?>
                                                <span class="required-icon tooltip"></span>
                                                <?php endif; ?>
                                      </li>  
                                   
                                        
                                      <li class="even">
						<label>Gsn IP</label>
						<?php echo form_input('gsnip', $gsn->gsnip); ?>
                                                <span class="required-icon tooltip"></span>
					</li>
                                        
                     <li>
						<label>SSL port</label>
						<?php echo form_input('portSSL', $gsn->portSSL); ?>
					</li>

					<li  class="even">
						<label>city</label>
						<?php echo form_input('city', $gsn->city); ?>
						<span class="required-icon tooltip">required</span>
					</li>
					
					
					<li>
						<label>state</label>
						<?php echo form_input('state', $gsn->state); ?>
						<span class="required-icon tooltip">required</span>
					</li>
                                        
 					<li class="even">
						<label>databaseSchema</label>
						<?php echo form_input('databaseSchema', $gsn->databaseSchema); ?>
						<span class="required-icon tooltip">required</span>
					</li>
                                        
                                        <li>
						<label>databaseUser</label>
						<?php echo form_input('databaseUser', $gsn->databaseUser); ?>
						<span class="required-icon tooltip">required</span>
					</li>
                                        
                                        <li class="even">
						<label>databasepasswd</label>
						<?php echo form_password('databasePassword', $gsn->databasePassword); ?>
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


<script type="text/javascript">
(function ($) {
	$(function(){
		$('input[name="password"], input[name="confirm_password"]').val('');
	});
	$("#editpassword").click(function () {
		$("#edit_pass").toggle("normal");
	}); 
})(jQuery);

</script>
 

