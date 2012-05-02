<?php
$this->pageTitle=Yii::app()->name . ' - Reports';
$this->breadcrumbs=array(
	'Reports',
);
?>

<h1>Under construction</h1>

<?php if(Yii::app()->user->hasFlash('reports')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('reports'); ?>
</div>

<?php else: ?>

<p>
This site is under construction!
</p>

<?php endif; ?>