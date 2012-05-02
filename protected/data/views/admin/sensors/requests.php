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
        <?php echo $shortcuts; ?>
         <?php if ($this->session->flashdata('success')): ?>
			<div class="closable notification success">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		 <?php endif; ?>
         <?php if ($this->session->flashdata('error')): ?>
			<div class="closable notification error">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		 <?php endif; ?>                       
		<div id="content">
                    <?php if ($this->router->method == 'getSensorPendingRequests') { ?>
                    <h5> Sensor requests </h5>
                    <?php } ?>
                    
                     <?php if ($this->router->method == 'getSensorApprovedRequests') { ?>
                    <h5> Sensor users </h5>
                    <?php } ?>
			<?php if (!empty($requests)): ?>
                <?php echo form_open('admin_gsn/action'); ?>
                    <table border="0" class="table-list">
                        <thead>
                            <tr>                               
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Sensor</th>
                                <th>Requested Date</th>
                                <th>Active</th>										
                                <th>Action</th>
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
                            <?php foreach ($requests as $request): ?>
                                <tr>                                    
                                    <td><?php echo $request->firstName.' '.$request->lastName; ?></td>
                                    <td><?php echo $request->username; ?></td>
                                    <td><?php echo $request->email; ?></td>
                                    <td><?php echo $request->sensorName; ?></td>
                                    <td><?php echo date('M j, Y', strtotime($request->timeprivilegegiven)); ?></td>
                                    <td><?php echo $request->isactive ? 'Yes' : 'No'; ?></td>                                                                                                                                                 
                                    <td class="align-center buttons buttons-small">
                                       <?php if (($this->router->method == 'getSensorPendingRequests') || 
                                                 ($this->router->method == 'getSensorRequests')) { ?>
                                       <?php echo $request->isactive ? 'Access' : anchor('admin_sensors/approverequest/' . $request->sensorprivilegecode, 'Approve', 'Approved'); ?>
                                        <?php } ?>
                                         <?php echo anchor('admin_sensors/disapproverequest/' . $request->sensorprivilegecode, 'Dispprove' ); ?>        
                                        <?php //echo anchor('admin_gsn/deletegsn/' . $request->gsnCode, 'Delete', array('class'=>'confirm delete-icon')); ?>
                                    </td>						
                                    </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <!--<div class="buttons float-right padding-top" align="right">
                    <button type="submit" name="btnAction" value="delete" class="button confirm">
                        <span>Delete</span>
                    </button>
                </div>-->
            
            <?php echo form_close(); ?>
            
            <?php else: ?>
                <div class="blank-slate">
                    <?php //echo img('/images/user.png'); ?>
                    <h2>There are no requests  </h2>
                </div>
            <?php endif; ?>
</div>
	</section>
</div>
</body>
</html>
