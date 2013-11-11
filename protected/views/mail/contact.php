<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tableDesign.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link href="http://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/incrementButton.css" />

	<style>
	    /*
	Maximus4T by 4Templates | http://www.4templates.com/free/ | @4templates
	Licensed under the Creative Commons Attribution 3.0 License
*/

html, body {
    height: 100%;
}

body {
    margin: 0px;
    padding: 0px;
    background: #E6E6E6 url("../images/wrapper-bg.jpg") repeat;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: 13px;
    color: #4B4B4B;
}

h1, h2, h3 {
    margin: 0px;
    padding: 0px;
    font-family: 'Oswald', sans-serif;
    font-weight: 400;
}

p, ol, ul {
    margin-top: 0px;
}

p, ol {
    line-height: 190%;
}

strong {
}

a {
    color: #2D8191;
}

a:hover {
    text-decoration: none;
}

a img {
    border: none;
}

img.border {
}

img.alignleft {
    float: left;
}

img.alignright {
    float: right;
}

img.aligncenter {
    margin: 0px auto;
}

hr {
    display: none;
}

/** WRAPPER */

#wrapper {
}

.container {
    width: 980px;
    margin: 0px auto;
}

.clearfix {
    clear: both;
}

/** HEADER */

#header-wrapper {
    /**height: 161px;
    background: url("../images/header-bg.png") repeat-x left top;**/
    height: 100px;
    background: url("../images/header-bg_small.png") repeat-x left top;
}

#header {
    overflow: hidden;
    width: 940px;
    height: 100px;
    margin: 0px auto;
}

/** LOGO */

#logo {
    height: 100px;
}

#logo h1, #logo p {
    margin: 0px;
    line-height: normal;
}

#logo h1 a {
    display: block;
    float: left;
    padding: 30px 0px 0px 0px;
    letter-spacing: -2px;
    text-decoration: none;
    text-shadow: 2px 2px 2px #222222;
    font-size: 40px;
    color: #FFFFFF;
}

#logo p {
    float: right;
    padding: 60px 0px 0px 0px;
    text-shadow: 1px 1px 1px #222222;
    font-family: 'Oswald', sans-serif;
    font-size: 18px;
    color: #B5B5B5;
}

/** MENU */

#menu-wrapper {
    width: 954px;
    height: 77px;
    margin: 30px auto 0px auto;
    padding: 0px 60px;
    background: url("../images/menu-content-bg.png") no-repeat left top;
}

#menu-content {
    float: left;
    width: 954px;
    height: 62px;
    margin: 0px;
    padding: 15px 0px 0px 0px;
}

#menu {
    height: 36px;
    margin: 0px;
    padding: 0px;
    list-style: none;
    line-height: 36px;
    text-decoration: none;
    text-shadow: 1px 1px 1px #191919;
    font-family: 'Oswald', sans-serif;
    font-size: 13px;
    color: #FFFFFF;
}

#menu li {
    float: left;
    height: 36px;
    margin-right: 6px;
}

#menu a {
    text-decoration: none;
    color: #FFFFFF;
}

#menu a:hover {
    text-decoration: none;
}

#menu .arrow {
    background: url("../images/menu_bg05.png") no-repeat right top;
}

#menu li span {
    display: block;
    height: 36px;
    padding: 0px 20px 0px 20px;
    text-shadow: 1px 1px 1px #171717;
}

#menu li.first {
    background: url("../images/menu-first-bgleft.png") no-repeat left top;
}

#menu li.first span {
    height: 36px;
    padding-right: 20px;
    background: url("../images/menu-first-bgright.png") no-repeat right top;
    text-shadow: 1px 1px 1px #3E656D;
}

#menu li.active {
    position: relative;
    background: url("../images/menu-active-bgleft.png") no-repeat left top;
    z-index: 5;
}

#menu li.active span {
    height: 36px;
    background: url("../images/menu-active-bgright.png") no-repeat right top;
}

#menu .arrow {
}

/** DROPOTRON */

.dropotron li.opener {
}

.dropotron {
    width: 202px;
    margin-top: -1px;
    padding: 10px 0px;
    border-top: 1px solid #3F3F3F;
    background: url("../images/dropotron-menu-bg.png") no-repeat left bottom;
    list-style: none;
    text-shadow: 1px 1px 0px rgba(22, 22, 22, 1);
    font-family: 'Oswald', sans-serif;
    font-size: 13px;
    font-family: 400;
    color: #FFFFFF;
}

.dropotron a {
    text-decoration: none;
    color: #FFFFFF;
}

.dropotron li {
    height: 39px;
    padding: 0px 20px;
    background: url("../images/dropotron-menu-separator.png") no-repeat left top;
    line-height: 39px;
    color: #FFFFFF;
}

.dropotron li:hover {
    background: url("../images/dropotron-menu-active-hover.png") no-repeat left top;
}

.dropotron li:hover > a, .dropotron li:hover > span {
    color: #FFFFFF;
}

.dropotron li .arrow {
}

.dropotron span {
    display: block;
    margin-right: -1px;
}

.dropotron li:hover > span {
}

.dropotron .first {
    background: none;
}

/** SEARCH */

#search {
    float: right;
    width: 270px;
    height: 77px;
}

#search form {
    margin: 0px;
    padding: 15px 0px 0px 0px;
}

#search fieldset {
    margin: 0;
    padding: 0;
    border: none;
}

#search input.blank {
    color: #7C7768;
}

#search-text {
    outline: none;
    width: 220px;
    height: 35px;
    border: none;
    padding: 0px 0px 0px 10px;
    background: none;
    line-height: 35px;
    font-family: 'Oswald', sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #B5B5B5;
}

#search-submit {
    display: none;
}

/** PAGE */

#page {
    overflow: hidden;
    width: 1070px;
    margin: 0px auto;
}

#page .bgtop {
    height: 5px;
    background: url("../images/page-content-bg-01.png") no-repeat center top;
}

#page .bgbtm {
    height: 5px;
    background: url("../images/page-content-bg-02.png") no-repeat center bottom;
}

#page .content-bg {
    overflow: hidden;
    padding: 20px 0px 50px 0px;
    background: url("../images/page-content-bg-02.png") repeat-y center top;
}

/** CONTENT */

#content {
    float: left;
    width: 735px;
}

/** SIDEBAR */

#sidebar {
    float: right;
    width: 335px;
}

#sidebar .title {
    display: block;
    width: 305px;
    height: 50px;
    margin-bottom: 20px;
    margin-top: 30px;
    padding: 16px 0px 0px 30px;
    background: url("../images/sidebar-title-bg.png") no-repeat right top;
    font-family: 'Oswald', sans-serif;
    font-size: 18px;
    font-weight: 400;
    color: #FFFFFF;
}

#sidebar p {
    padding: 0px 60px 0px 30px;
}

#sidebar ul {
    margin: 0px;
    padding: 0px 0px 0px 0px;
    list-style: none;
}

#sidebar li {
    background: url("../images/list-separator-bg.png") repeat-x left top;
    margin: 0px 60px 0px 30px;
    padding: 10px 0px 10px 0px;
}

#sidebar li a {
    display: block;
    text-shadow: 1px 1px 0px rgba(255, 255, 255, 1);
}

#sidebar .first {
    background: none;
}

/** FOOTER */

#footer {
    overflow: hidden;
    height: 165px;
}

#footer p {
    margin: 0px;
    padding: 10px 0px 0px 0px;
    text-align: center;
    text-shadow: 1px 1px 1px #FFFFFF;
    color: #636363;
}

#footer a {
    color: #636363;
}

#footer .legal {
}

#footer .links {
}

#footer-content {
    width: 1000px;
    margin: 0px auto;
    text-shadow: 1px 1px 0px rgba(255, 255, 255, 1);
    color: #4B4B4B;
}

#footer-content h2 {
    padding: 0px 0px 20px 0px;
    font-size: 18px;
}

#footer-content .bgtop {
    height: 5px;
    background: url("../images/footer-content-bg-01.png") no-repeat left top;
}

#footer-content .bgbtm {
    height: 5px;
    background: url("../images/footer-content-bg-03.png") no-repeat left top;
}

#footer-content .content-bg {
    overflow: hidden;
    padding: 60px 50px 50px 65px;
    background: url("../images/footer-content-bg-02.png") repeat-y left top;
}

#footer-content #column1 {
    float: left;
    width: 520px;
}

#footer-content #column1 .box1 {
    float: left;
    width: 225px;
}

#footer-content #column1 .box2 {
    float: right;
    width: 225px;
}

#footer-content #column2 {
    float: right;
    width: 225px;
}

/** POST STYLE  */


.post {
    overflow: hidden;
}

.post .title {
    display: block;
    margin: 0px;
    padding: 0px 0px 0px 0px;
    letter-spacing: -2px;
    font-family: 'Oswald', sans-serif;
    font-size: 40px;
    color: #2E2E2E;
}

.post .date {
    overflow: hidden;
    float: left;
    width: 65px;
    height: 76px;
    margin: 10px 0px 0px 0px;
    padding: 5px 20px 0px 20px;
    background: url("../images/post-date-bg.png") no-repeat left top;
    line-height: normal;
    text-align: center;
    text-shadow: 1px 1px 0px rgba(71, 108, 115, 1);
    font-family: 'Oswald', sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #FFFFFF;
}

.post .date b {
    margin: 0;
    padding: 0;
    display: block;
    margin-top: -5px;
    font-size: 30px;
    font-weight: 400;
}

.post .entry {
    overflow: hidden;
    padding: 30px 75px 0px 110px;
}

.post .img-style1 {
    margin-bottom: 20px;
}

.post .posted {
    margin-top: -5px;
    padding: 0px 0px 0px 30px;
    background: url("../images/post-posted-bg.png") no-repeat left top;
    font-family: 'Oswald', sans-serif;
    font-size: 16px;
    color: #A9A9A9;
}

.post .posted a {
    color: #A9A9A9;
}

.post .meta {
    overflow: hidden;
    display: block;
    height: 54px;
    margin-top: 50px;
    padding: 0px 20px;
    background: url("../images/posted-meta-bg.png") no-repeat left top;
    text-shadow: 1px 2px 0px rgba(255, 255, 255, 1);
    font-family: 'Oswald', sans-serif;
    font-size: 13px;
    font-weight: 400;
    color: #535353;
}

.post .meta a {
    color: #535353;
}

.post .meta .listed {
    float: left;
    padding-right: 25px;
    line-height: 54px;
    background: url("../images/posted-meta-separator.png") no-repeat right 50%;
}

.post .meta .tags {
    float: left;
    padding-left: 20px;
    line-height: 54px;
}

.post .meta .comments {
    float: right;
    line-height: 54px;
}

/** BANNER */

#banner-wrapper {
    overflow: hidden;
    width: 970px;
    height: 325px;
    margin: 0px auto;
    padding: 20px 0px 0px 30px;
    background: url("../images/banner-wrapper-bg.png") repeat-y left top;
}

#banner {
    width: 960px;
    height: 297px;
    position: relative;
    background: url("../images/banner-image-border.jpg") no-repeat left top;
}

#banner .image, #banner .caption1, #banner .caption2, #banner .border {
    position: absolute;
}

#banner .image {
    width: 900px;
    height: 257px;
    top: 20px;
    left: 20px;
}

#banner .border {
    width: 960px;
    height: 297px;
    top: 0px;
    left: 0px;
}

div.breadcrumbs
{
    font-size: 0.9em;
    padding: 5px 20px;
}

div.breadcrumbs span
{
    font-weight: bold;
}

div.compactRadioGroup LABEL,
div.compactRadioGroup INPUT {
    display: inline;
}

/* Rounded-cornered divs -*/
.roundedBox {position:relative; padding:17px; margin:10px 0;}

/*- All the corners -*/
.corner {position:absolute; width:17px; height:17px;}

/*- Each corner -*/
.topLeft {top:0; left:0; background-position:-1px -1px;}
.topRight {top:0; right:0; background-position:-19px -1px;}
.bottomLeft {bottom:0; left:0; background-position:-1px -19px;}
.bottomRight {bottom:0; right:0; background-position:-19px -19px;}


/*- Type1 - Blue -*/
#type1 {background-color:#CCDEDE;}
#type1 .corner {background-image:url(http://161.53.67.224/lion/images/corners-type1.gif);}

/*- Type2 - Green -*/
#type2 {background-color:#CDDFCA;}
#type2 .corner {background-image:url(http://161.53.67.224/lion/images/corners-type2.gif);}

/*- Type3 - Violet -*/
#type3 {background-color:#D3CADF;}
#type3 .corner {background-image:url(http://161.53.67.224/lion/images/corners-type3.gif);}

/*- Type4 - Red with border -*/
/* We change the corners' position and add the border */
#type4 {background-color:#CCACAE; border:1px solid #AD9396;}
#type4 .corner {background-image:url(http://161.53.67.224/lion/images/corners-type4.gif);}
#type4 .topLeft {top:-1px; left:-1px;}
#type4 .topRight {top:-1px; right:-1px;}
#type4 .bottomLeft {bottom:-1px; left:-1px;}
#type4 .bottomRight {bottom:-1px; right:-1px;}

/*- Type5 - With gradient -*/
/* We change the top corners' height, and the bottom corners background-position. We must also add to the containing div a gradient to repeat in x. */
#type5 {background:#FECBCA url(http://161.53.67.224/lion/images/roundedbox-type5-bg.png) repeat-x 0 0; min-height:110px;}
#type5 .corner {background-image:url(http://161.53.67.224/lion/images/corners-type5.png);}
#type5 .topLeft,
#type5 .topRight {height:140px;}
#type5 .bottomLeft {background-position:-1px -142px;}
#type5 .bottomRight {background-position:-19px -142px;}

	</style>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
	<div id="header-wrapper">
	    <div id="header">
		<div id="logo">
		    <h1><a href="#">Lion</a></h1>
		    <p><?php if (!Yii::app()->user->isGuest) echo "Welcome " . Yii::app()->user->name; ?></p>
		</div>
	    </div>
	</div>
	<div id="banner-wrapper">
	    <div id="banner">
		<div class="image">
		<?php
		    $this->widget('application.extensions.seqimage.seqimage.SeqImage',array(
		    'widthImage' => 900,
		    'heightImage' => 257,
		    'slides'=>array(
			array(
			    'image'=>array('src'=>Yii::app()->request->baseUrl.'/images/presentation_1.png'),
			    'link'=>array('url'=>'mypage','htmlOptions'=>array())
			),
			array(
			    'image'=>array('src'=>Yii::app()->request->baseUrl.'/images/presentation_2.png'),
			),
			array(
			    'image'=>array('src'=>Yii::app()->request->baseUrl.'/images/presentation_3.png'),
			)
		  )));
		?>
		</div>
<!--		<div class="image"><a href="#"><img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/pics02.jpg" width="900" height="257" alt="" /></a></div>-->
		<div class="border">
		    <?php if (isset($this->breadcrumbs)): ?>
			<?php
			    $this->widget('zii.widgets.CBreadcrumbs', array(
			    'links' => $this->breadcrumbs,
			    ));
			?><!-- breadcrumbs -->
		    <?php endif ?>
		</div>
	    </div>
	</div>
	<div id="page">
	    <div class="bgtop"></div>
	    <div class="content-bg">
		<div id="content">
<div class="post">
    <p class="date"><?php echo date("M"); ?><b><?php echo date("j"); ?></b></p>
    <h2 class="title">Contact us</h2>
    <p class="posted">Lion development team</p>

    <div class="entry">
	<div class="roundedBox" id="type1">
	    <p>
		<?php
		echo (isset($model->message) ? $model->message : "If you have business inquiries or other questions, please fill out the following form to contact us. Thank you in advance.");
		?>
	    </p>

	    <div class="form">

		<?php
		$form = $this->beginWidget('CActiveForm', array(
			    'id' => 'contact-form',
			    'enableClientValidation' => true,
			    'clientOptions' => array(
				'validateOnSubmit' => true,
			    ),
			));
		?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
		    <?php echo $form->labelEx($model, 'name'); ?>
		    <?php echo $form->textField($model, 'name'); ?>
		    <?php echo $form->error($model, 'name'); ?>
		</div>

		<div class="row">
		    <?php echo $form->labelEx($model, 'email'); ?>
		    <?php echo $form->textField($model, 'email'); ?>
		    <?php echo $form->error($model, 'email'); ?>
		</div>

		<div class="row">
		    <?php echo $form->labelEx($model, 'subject'); ?>
		    <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128)); ?>
		    <?php echo $form->error($model, 'subject'); ?>
		</div>

		<div class="row">
		    <?php echo $form->labelEx($model, 'body'); ?>
		    <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50)); ?>
		    <?php echo $form->error($model, 'body'); ?>
		</div>

		<?php if (CCaptcha::checkRequirements()): ?>
			<div class="row">
		    <?php echo $form->labelEx($model, 'verifyCode'); ?>
    		    <div>
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model, 'verifyCode'); ?>
		    </div>
		    <div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div>
		    <?php echo $form->error($model, 'verifyCode'); ?>
    		</div>
		<?php endif; ?>

			<div class="row buttons">
		    <?php echo CHtml::submitButton('Submit'); ?>
    		</div>

		<?php $this->endWidget(); ?>

	    </div><!-- form -->
	    <div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div>
	</div>

    </div>
</div>
		</div>
	    <div id="sidebar">
		<div>
		    <h2 class="title">About Lion</h2>
		    <p>Lion is a project developed under Faculty of Electrical Engineering and Computing. It collects data from all around the world and provides user interface for managing all data sources and actions.</p>
		</div>
		<div>
		    <h2 class="title">Lion team</h2>
		    <p>Lion was developed by students<br/><br/>Matija Renić<br/>Luka Postružin<br/><br/>under supervision of dr.sc.Mario Žagar</p>
		</div>
	    </div>
	</div>
	<div class="bgbtm"></div>
	</div>
	<div id="footer-content">
	    <div class="bgtop"></div>
	    <div class="content-bg">
		<div id="column1">
		    <div class="box1">
			<h2>What is GSN?</h2>
			<p><a href ="http://sourceforge.net/apps/trac/gsn/">GSN</a> stands for Global sensor networks project. Basically it is a web server that collects various data from multiple sources.</p>
		    </div>
		    <div class="box2">
			<h2>What is RASIP?</h2>
			<p><a href ="http://www.fer.unizg.hr/rasip/onama">RASIP</a> is a department on FER. It holds many open source courses and  a course about distributed software development.</p>
		    </div>
		</div>
		<div id="column2">
		    <div class="box3">
			<h2>What is FER?</h2>
			<p><a href ="http://www.fer.unizg.hr">FER</a> is a faculty from Zagreb, Croatia. It is a part of University of Zagreb.</p>
		    </div>
		</div>
	    </div>
	    <div class="bgbtm"></div>
	</div>
        <div id="footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> by FER, University of Zagreb.</p>
            <p>All Rights Reserved.</p>
        </div><!-- footer -->
    </body>
</html>