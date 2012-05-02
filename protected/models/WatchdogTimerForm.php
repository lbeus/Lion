<?php

/**
 * NotificationsForm class.
 * NotificationsForm is the data structure for making a new notification. It is used by the 'contact' action of 'SiteController'.
 */
class WatchdogTimerForm extends CFormModel
{
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
	}
	
	/*
	* Filling in the information in the appropriate table
	*/
	public function newEmailNotification()
	{
		
	}
	

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	
	public function attributeLabels()
	{
	}
	
}