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
			 <h3>Send Email</h3> 

<?php echo form_open($this->uri->uri_string(), 'class="crud"'); ?>

       		<table border="0" class="table-list">
			<thead>
				<tr>
					<th width="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
					<th width="200">Name</th>
					<th>Email</th>
					<th>Username</th>
					<th width="100">Phone</th>
					<th>Role</th>								
					<th>Active</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					
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
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>                  
                                              
	<div class="tabs">

		
		<!-- Content tab -->
 <button id="editpassword" type="button" value="change" class="button">  <span>Send Email</span>  </button>
		</button>                 
		
                    <div id="edit_pass" style="display:none">
			<fieldset>
				<ol>   
					<li class="even">
					<label>Addional Email address</label>  <br />
						<?php echo form_input('email',$user->email); ?>                                                                                            
                                         
					</li>
                                        <li class="even">
					<label>Subject</label>
						<?php echo form_input('subject',$user->subject); ?>
						<span class="required-icon tooltip"> </span>                                                
					</li>
                                        
					<li class="even">
						<label>Message</label>
						<?php  echo form_textarea('message', $user->message) ?> 
						<span class="required-icon tooltip">required</span>
					</li>
                                        </div>
				</ol>
			</fieldset>
                        </div>
		<!-- content tab close -->
               <br />

                               	<div class="buttons float-right padding-top" align="right">
		  
	<button type="submit" name="btnAction" value="send" class="button">
			<span>Send</span>
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
 

