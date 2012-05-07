<?php
$this->breadcrumbs = array(
    'Di Gsns' => array('diGsn/index'),
    'Create',
);
?>

<div class="post">
    <p class="date"><?php echo date("M"); ?><b><?php echo date("j"); ?></b></p>
    <h2 class="title">Create new GSN</h2>
    <p class="posted">Lion development team</p>
    <div class="entry">
	<p>If you need further managing, proceed with following links:</p>
	<?php
	echo "<ul>";
	echo "<li>" . CHtml::link('Manage DiGsn', array('diGsn/admin')) . "</li>";
	echo "<li>" . CHtml::link('List DiGsn', array('diGsn/index')) . "</li>";
	echo "</ul>";
	?>
	<div class="roundedBox" id="type1">
	    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
	    <div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div>
	</div>
    </div>
</div>