<?php

/**
 * This is the model class for table "f_sensor_type".
 *
 * The followings are the available columns in table 'f_sensor_type':
 * @property integer $unit_id
 * @property integer $sensor_id
 *
 * The followings are the available model relations:
 * @property DiSensors $sensor
 * @property DiUnits $unit
 */
class FSensorType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FSensorType the static model class
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
		return 'f_sensor_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_id, sensor_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('unit_id, sensor_id', 'safe', 'on'=>'search'),
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
			'unit_id' => 'Unit',
			'sensor_id' => 'Sensor',
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

		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('sensor_id',$this->sensor_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}