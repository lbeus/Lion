<?php
$this->pageTitle=Yii::app()->name . ' - Sensors';
$this->breadcrumbs=array(
	'Sensors',
);
?>

<h1>Under construction</h1>

<?php if(Yii::app()->user->hasFlash('sensors')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('sensors'); ?>
</div>

<?php else: ?>

<p>
This site is under construction!
</p>

<?php endif; ?>