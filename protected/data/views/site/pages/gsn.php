<?php
$this->pageTitle=Yii::app()->name . ' - GSN';
$this->breadcrumbs=array(
	'GSN',
);
?>

<h1>Under construction</h1>

<?php if(Yii::app()->user->hasFlash('gsn')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('gsn'); ?>
</div>

<?php else: ?>

<p>
This site is under construction!
</p>

<?php endif; ?>