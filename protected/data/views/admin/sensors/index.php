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
		  <?php if ($this->session->flashdata('success')): ?>
				<div class="closable notification success">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
		 <?php endif; ?>
		 <?php if (isset($error_string) && $error_string != ''): ?>
			 <div class="closable notification error">
				<?php echo $error_string; ?>
			</div>
		<?php endif; ?>
		<div id="content">
			<?php $this->load->view('admin/sensors/listsensors'); ?>			 
		</div>
	</section>
</div>
</body>
</html>
