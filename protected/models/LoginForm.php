<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $login_username;
	public $login_password;
	public $login_remember;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that login_username and login_password are required,
	 * and login_password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// login_username and login_password are required
			array('login_username, login_password', 'required'),
			// login_remember needs to be a boolean
			array('login_remember', 'boolean'),
			// login_password needs to be authenticated
			array('login_password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'login_remember'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the login_password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->login_username,$this->login_password);
			if(!$this->_identity->authenticate())
				$this->addError('login_password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and login_password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->login_username,$this->login_password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->login_remember ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
