<?php

/**
 * This is the model class for table "l_readings".
 *
 * The followings are the available columns in table 'l_readings':
 * @property string $reading_id
 * @property integer $gsn_id
 * @property integer $sensor_id
 * @property integer $unit_id
 * @property string $date_id
 * @property integer $time_id
 * @property string $time_of_the_reading
 * @property double $value
 */
class LReadings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LReadings the static model class
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
		return 'l_readings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gsn_id, sensor_id, unit_id, time_id', 'numerical', 'integerOnly'=>true),
			array('value', 'numerical'),
			array('date_id, time_of_the_reading', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reading_id, gsn_id, sensor_id, unit_id, date_id, time_id, time_of_the_reading, value', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reading_id' => 'Reading',
			'gsn_id' => 'Gsn',
			'sensor_id' => 'Sensor',
			'unit_id' => 'Unit',
			'date_id' => 'Date',
			'time_id' => 'Time',
			'time_of_the_reading' => 'Time Of The Reading',
			'value' => 'Value',
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

		$criteria->compare('reading_id',$this->reading_id,true);
		$criteria->compare('gsn_id',$this->gsn_id);
		$criteria->compare('sensor_id',$this->sensor_id);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('date_id',$this->date_id,true);
		$criteria->compare('time_id',$this->time_id);
		$criteria->compare('time_of_the_reading',$this->time_of_the_reading,true);
		$criteria->compare('value',$this->value);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}