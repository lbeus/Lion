<?php

/**
 * NotificationsForm class.
 * NotificationsForm is the data structure for making a new notification. It is used by the 'contact' action of 'SiteController'.
 */
class NotificationsForm extends CFormModel
{
	public $email;
	public $phoneNumber;
	public $verifyCode;
	public $notificationType;
	//interval between two notifications that will be sent to the user
	public $resendingInterval;
	//criteria on which notifications are being sent. If above is chosen user will get notification on value above the criticalValue, if below, than he will get notification when measured value is below critical value
	public $criteriaType;
	//critical value on which notifications are being sent (in combination to above/below action)
	public $criticalValue;
	//sensor list for user to choose from
	public $sensorList;
	//gsn list for user to choose from
	public $gsnList;
	//measuring units list for user to choose from
	public $measuringUnitList;
	
	//some variables for using with controller actions
	public $gsn_id;
	public $sensor_id;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// all the fields are required
			array('notificationType, resendingInterval, criteriaType, criticalValue, sensorList, gsnList, measuringUnitList', 'required'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
	
}