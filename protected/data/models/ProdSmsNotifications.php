<?php

/**
 * This is the model class for table "prod_sms_notifications".
 *
 * The followings are the available columns in table 'prod_sms_notifications':
 * @property integer $notification_id
 * @property integer $time_notification_asked
 * @property integer $time_notification_approved
 * @property string $is_active
 * @property integer $unit_id
 * @property integer $sensor_id
 * @property integer $prod_user_id
 * @property string $unit_name
 * @property string $unit_name_upper
 * @property string $sensor_name
 * @property string $xml_name
 * @property string $phone
 * @property integer $critical_value
 * @property integer $resending_interval
 *
 * The followings are the available model relations:
 * @property ProdUsers $prodUser
 * @property DiSensors $sensor
 * @property DiUnits $unit
 */
class ProdSmsNotifications extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProdSmsNotifications the static model class
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
		return 'prod_sms_notifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time_notification_asked, time_notification_approved, unit_id, sensor_id, prod_user_id, critical_value, resending_interval', 'numerical', 'integerOnly'=>true),
			array('is_active', 'length', 'max'=>1),
			array('unit_name, unit_name_upper, sensor_name, phone', 'length', 'max'=>40),
			array('xml_name', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('notification_id, time_notification_asked, time_notification_approved, is_active, unit_id, sensor_id, prod_user_id, unit_name, unit_name_upper, sensor_name, xml_name, phone, critical_value, resending_interval', 'safe', 'on'=>'search'),
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
			'prodUser' => array(self::BELONGS_TO, 'ProdUsers', 'prod_user_id'),
			'sensor' => array(self::BELONGS_TO, 'DiSensors', 'sensor_id'),
			'unit' => array(self::BELONGS_TO, 'DiUnits', 'unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'notification_id' => 'Notification',
			'time_notification_asked' => 'Time Notification Asked',
			'time_notification_approved' => 'Time Notification Approved',
			'is_active' => 'Is Active',
			'unit_id' => 'Unit',
			'sensor_id' => 'Sensor',
			'prod_user_id' => 'Prod User',
			'unit_name' => 'Unit Name',
			'unit_name_upper' => 'Unit Name Upper',
			'sensor_name' => 'Sensor Name',
			'xml_name' => 'Xml Name',
			'phone' => 'Phone',
			'critical_value' => 'Critical Value',
			'resending_interval' => 'Resending Interval',
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

		$criteria->compare('notification_id',$this->notification_id);
		$criteria->compare('time_notification_asked',$this->time_notification_asked);
		$criteria->compare('time_notification_approved',$this->time_notification_approved);
		$criteria->compare('is_active',$this->is_active,true);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('sensor_id',$this->sensor_id);
		$criteria->compare('prod_user_id',$this->prod_user_id);
		$criteria->compare('unit_name',$this->unit_name,true);
		$criteria->compare('unit_name_upper',$this->unit_name_upper,true);
		$criteria->compare('sensor_name',$this->sensor_name,true);
		$criteria->compare('xml_name',$this->xml_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('critical_value',$this->critical_value);
		$criteria->compare('resending_interval',$this->resending_interval);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}