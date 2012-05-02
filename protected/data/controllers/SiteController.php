<?php

class SiteController extends Controller
{

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout = 'temp_two_columns';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the notifications page
	 */
	public function actionNotifications()
	{
		$model=new NotificationsForm;
		
		//$this->layout = 'temp';
		
		$model->notificationType = ((int)!empty($_REQUEST['notification_type']) ? $_REQUEST['notification_type'] : 0);
		$model->gsn_id = ((int)!empty($_REQUEST['gsn_id']) ? $_REQUEST['gsn_id'] : 0);
		$model->sensor_id = ((int)!empty($_REQUEST['sensor_id']) ? $_REQUEST['sensor_id'] : 0);
		
		if(isset($_POST['NotificationsForm']))
		{
			$model->attributes=$_POST['NotificationsForm'];
			if($model->validate())
			{
				/*
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				*/
				Yii::app()->user->setFlash('notifications','Thank you for your time to fill in the form. Your request has been activated.');
				$this->refresh();
			}
		}
		$this->render('notifications',array('model'=>$model));
	}
	
	/**
	 * Displays the gsnList page
	 */
	public function actionGsnList()
	{
		$model=new GsnList;
		
		$model->approvedGsnList = CHtml::listData(
			diGsn::model()->
			with(array(
				'diGsnPrivileges'=>array(
					// we don't want to select posts
					'select'=>false,
					// but want to get only users with published posts
					'joinType'=>'INNER JOIN',
					'condition'=>'"diGsnPrivileges".user_id=1',
				),
			))->findAll(),'gsn_id','gsn_name'
		);
	
		$this->render('gsnList',array('model'=>$model));
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		$this->layout = 'temp_two_columns';
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login() && Yii::app()->user->group ==1)
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect(array('/admin/index'));
			else if ($model->validate() && $model->login() && Yii::app()->user->group !=1)
				$this->redirect(array('/site/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/*
	public function accessRules ()
	{
		return array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update','dynamiccities'),
					'users'=>array('@'),
				);
	}
	*/
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}