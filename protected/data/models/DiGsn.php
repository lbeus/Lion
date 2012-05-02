<?php

/**
 * This is the model class for table "di_gsn".
 *
 * The followings are the available columns in table 'di_gsn':
 * @property integer $gsn_id
 * @property string $gsn_name
 * @property string $gsn_url
 * @property string $city
 * @property string $state
 * @property string $last_change
 * @property string $is_active
 * @property string $is_dummy
 * @property string $date_activated_id
 * @property string $date_deactivated_id
 * @property string $username
 * @property string $password
 * @property string $gsn_ip
 * @property integer $gsn_port
 * @property integer $port_ssl
 * @property string $database_schema
 * @property string $database_user
 * @property string $database_password
 * @property integer $database_port
 *
 * The followings are the available model relations:
 * @property AggDay[] $aggDays
 * @property AggDayPart[] $aggDayParts
 * @property AggMonthDayPart[] $aggMonthDayParts
 * @property DiSensors[] $diSensors
 * @property DiDays $dateActivated
 * @property DiDays $dateDeactivated
 * @property DiGsnPrivileges[] $diGsnPrivileges
 */
class DiGsn extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiGsn the static model class
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
		return 'di_gsn';
	}

	public function beforeSave()
	{
		$this->last_change = new CDbExpression('NOW()');
		
		if ($this->isNewRecord)
		{
			$this->is_dummy = '0';
			$this->date_activated_id = new CDbExpression('NOW()');
		}
		
		return parent::beforeSave();
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gsn_port, port_ssl, database_port', 'numerical', 'integerOnly'=>true),
			array('gsn_name, gsn_url', 'length', 'max'=>40),
			array('city, state, username, password, database_schema, database_user', 'length', 'max'=>30),
			array('is_active, is_dummy', 'length', 'max'=>1),
			array('gsn_ip', 'length', 'max'=>16),
			array('last_change, date_activated_id, date_deactivated_id, database_password', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gsn_id, gsn_name, gsn_url, city, state, last_change, is_active, is_dummy, date_activated_id, date_deactivated_id, username, password, gsn_ip, gsn_port, port_ssl, database_schema, database_user, database_password, database_port', 'safe', 'on'=>'search'),
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
			'aggDays' => array(self::HAS_MANY, 'AggDay', 'gsn_id'),
			'aggDayParts' => array(self::HAS_MANY, 'AggDayPart', 'gsn_id'),
			'aggMonthDayParts' => array(self::HAS_MANY, 'AggMonthDayPart', 'gsn_id'),
			'diSensors' => array(self::HAS_MANY, 'DiSensors', 'gsn_id'),
			'dateActivated' => array(self::BELONGS_TO, 'DiDays', 'date_activated_id'),
			'dateDeactivated' => array(self::BELONGS_TO, 'DiDays', 'date_deactivated_id'),
			'diGsnPrivileges' => array(self::HAS_MANY, 'DiGsnPrivileges', 'gsn_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gsn_id' => 'Gsn',
			'gsn_name' => 'Gsn Name',
			'gsn_url' => 'Gsn Url',
			'city' => 'City',
			'state' => 'State',
			'last_change' => 'Last Change',
			'is_active' => 'Is Active',
			'is_dummy' => 'Is Dummy',
			'date_activated_id' => 'Date Activated',
			'date_deactivated_id' => 'Date Deactivated',
			'username' => 'Username',
			'password' => 'Password',
			'gsn_ip' => 'Gsn Ip',
			'gsn_port' => 'Gsn Port',
			'port_ssl' => 'Port Ssl',
			'database_schema' => 'Database Schema',
			'database_user' => 'Database User',
			'database_password' => 'Database Password',
			'database_port' => 'Database Port',
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

		$criteria->compare('gsn_id',$this->gsn_id);
		$criteria->compare('gsn_name',$this->gsn_name,true);
		$criteria->compare('gsn_url',$this->gsn_url,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('last_change',$this->last_change,true);
		$criteria->compare('is_active',$this->is_active,true);
		$criteria->compare('is_dummy',$this->is_dummy,true);
		$criteria->compare('date_activated_id',$this->date_activated_id,true);
		$criteria->compare('date_deactivated_id',$this->date_deactivated_id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('gsn_ip',$this->gsn_ip,true);
		$criteria->compare('gsn_port',$this->gsn_port);
		$criteria->compare('port_ssl',$this->port_ssl);
		$criteria->compare('database_schema',$this->database_schema,true);
		$criteria->compare('database_user',$this->database_user,true);
		$criteria->compare('database_password',$this->database_password,true);
		$criteria->compare('database_port',$this->database_port);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}