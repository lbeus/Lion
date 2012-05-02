<nav id="shortcuts">
	<h6>Shortcuts</h6>
	<ul>    <?php if ($this->router->method != 'editadmin') { ?>
		<li><?php echo anchor('admin/create', 'Add user', 'class="add"'); ?></li>
		<li><?php echo anchor('admin/users', 'List users', ''); ?></li>
                
                <?php } ?>
	</ul>
	<br class="clear-both" />
</nav>