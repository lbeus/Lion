<?php

/**
 * This is the model class for table "prod_users".
 *
 * The followings are the available columns in table 'prod_users':
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property integer $group_id
 * @property string $ip_address
 * @property string $active
 * @property string $activation_code
 * @property string $created_on
 * @property string $last_login
 * @property string $username
 * @property string $forgotten_password_code
 * @property string $remember_code
 * @property string $phone
 *
 * The followings are the available model relations:
 * @property DiUsers[] $diUsers
 * @property ProdSmsNotifications[] $prodSmsNotifications
 * @property ProdEmailNotifications[] $prodEmailNotifications
 */
class ProdUsers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProdUsers the static model class
	 */
		 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prod_users';
	}
	
	public function beforeSave() 
	{
		$this->ip_address = Yii::app()->request->userHostAddress;
		
		$this->last_login = new CDbExpression('NOW()');
		
		if (isset($_POST['ProdUsers']))
		{
			$passwd = (isset($_POST['ProdUsers']['password'])) ? $_POST['ProdUsers']['password'] : "";	
			
			$length = 10;
			$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
			shuffle($chars);
			$this->activation_code = implode(array_slice($chars, 0, $length));
			
			$length = 10;
			$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
			shuffle($chars);
			$this->forgotten_password_code = implode(array_slice($chars, 0, $length));		
			
			$length = 10;
			$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
			shuffle($chars);
			$this->remember_code = implode(array_slice($chars, 0, $length));	

			$length = 5;
			$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
			shuffle($chars);
			
			$this->salt = implode(array_slice($chars, 0, $length));				
			$this->password = hash('sha256', $this->salt.$passwd);					
		}
		
		if ($this->isNewRecord)
		{
			$this->created_on = new CDbExpression('NOW()');		
			$this->active = '0';

                        if ($this->group_id == "")
                            $this->group_id = '0';

			//sending confirmation email to the user after creating his account
			$headers="From: ".Yii::app()->params['adminEmail']."\r\nReply-To: ".Yii::app()->params['adminEmail'];
			$subject = "Congratulations from ColdWatch team!";
			$body = "Hi ".$this->username."!\r\n\nWe are happy to inform you that your user request has been granted, and that you have been accepeted as a new user to our ColdWatch system!\r\n\nThese are the information we have on you, which we hope are correct:\r\n\nName: ".$this->first_name." ".$this->last_name."\r\nPassword: ".$passwd."\r\nActivation code: ".$this->forgotten_password_code." - We suggest you to save this code, as you will be asked for it in case you forget your password!\r\n\nFor all the question, feel free to contact us on ".Yii::app()->params['adminEmail'];
			mail($this->email,$subject,$body,$headers);
		}
	 
		return parent::beforeSave();
	}

	public function afterSave() 
	{
		
		return parent::afterSave();
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id', 'numerical', 'integerOnly'=>true),
			array('username','unique'),
			array('first_name, activation_code, forgotten_password_code, remember_code', 'length', 'max'=>40),
			array('last_name, email', 'length', 'max'=>50),
			array('password', 'length', 'max'=>100),
			array('salt', 'length', 'max'=>5),
			array('ip_address', 'length', 'max'=>16),
			array('active', 'length', 'max'=>1),
			array('username', 'length', 'max'=>30),
			array('phone', 'length', 'max'=>20),
			array('created_on, last_login', 'safe'),
                    array('username,first_name, last_name, password, email','required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, first_name, last_name, email, password, salt, group_id, ip_address, active, activation_code, created_on, last_login, username, forgotten_password_code, remember_code, phone', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'diGsnPrivileges' => array(self::HAS_MANY, 'DiGsnPrivileges', 'user_id'),		
			'prodSmsNotifications' => array(self::HAS_MANY, 'ProdSmsNotifications', 'prod_user_id'),
			'prodEmailNotifications' => array(self::HAS_MANY, 'ProdEmailNotifications', 'prod_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'salt' => 'Salt',
			'group_id' => 'Group',
			'ip_address' => 'Ip Address',
			'active' => 'Active',
			'activation_code' => 'Activation Code',
			'created_on' => 'Created On',
			'last_login' => 'Last Login',
			'username' => 'Username',
			'forgotten_password_code' => 'Forgotten Password Code',
			'remember_code' => 'Remember Code',
			'phone' => 'Phone',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('active',$this->active,true);
		$criteria->compare('activation_code',$this->activation_code,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('forgotten_password_code',$this->forgotten_password_code,true);
		$criteria->compare('remember_code',$this->remember_code,true);
		$criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}