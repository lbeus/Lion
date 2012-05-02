<?php

/**
 * NotificationsForm class.
 * NotificationsForm is the data structure for making a new notification. It is used by the 'contact' action of 'SiteController'.
 */
class UserNotifications extends CFormModel
{
	//email of the recipients
	public $email;
	//phone number of the recipient
	public $phone_number;
	//verification code user needs to fill in
	public $verify_code;
	//type of the notifications -sms/email
	public $notification_type;
	//interval between two notifications that will be sent to the user
	public $resending_interval;
	//criteria on which notifications are being sent. If above is chosen user will get notification on value above the criticalValue, if below, than he will get notification when measured value is below critical value
	public $criteria_type;
	public $criteria_type_name;
	//critical value on which notifications are being sent (in combination to above/below action)
	public $critical_value;
	//sensor list for user to choose from
	public $sensor_list;
	//gsn list for user to choose from
	public $gsn_list;
	//measuring units list for user to choose from
	public $measuring_unit_list;
	//some variables for using with controller actions
	public $gsn_id;
	//id of the chosen sensor
	public $sensor_id;
	//id for unit 
	public $unit_id;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// all the fields are required
			array('notification_type, resending_interval, criteria_type, critical_value, sensor_list, gsn_list, measuring_unit_list', 'required'),
			// verifyCode needs to be entered correctly
			array('verify_code', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
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
			'verify_code'=>'Verification Code',
		);
	}
	
}