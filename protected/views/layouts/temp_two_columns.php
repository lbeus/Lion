<?php $this->beginContent('//layouts/temp'); ?>
<div class="span-13">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="picture-right">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/pictures/lion_head_bw.jpg" alt="lion-head" width="190"/>
	</div>
</div>
<?php $this->endContent(); ?> 