<?php

/**
 * This is the model class for table "di_time".
 *
 * The followings are the available columns in table 'di_time':
 * @property integer $time_id
 * @property string $time
 * @property double $second
 * @property double $minute
 * @property double $hour
 * @property string $part_of_day
 * @property double $seconds_from_midnight
 * @property double $minutes_from_midnight
 * @property string $is_dummy
 * @property integer $day_part_id
 *
 * The followings are the available model relations:
 * @property FReadings[] $fReadings
 */
class DiTime extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiTime the static model class
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
		return 'di_time';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time_id', 'required'),
			array('time_id, day_part_id', 'numerical', 'integerOnly'=>true),
			array('second, minute, hour, seconds_from_midnight, minutes_from_midnight', 'numerical'),
			array('time, part_of_day, is_dummy', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('time_id, time, second, minute, hour, part_of_day, seconds_from_midnight, minutes_from_midnight, is_dummy, day_part_id', 'safe', 'on'=>'search'),
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
			'fReadings' => array(self::HAS_MANY, 'FReadings', 'time_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'time_id' => 'Time',
			'time' => 'Time',
			'second' => 'Second',
			'minute' => 'Minute',
			'hour' => 'Hour',
			'part_of_day' => 'Part Of Day',
			'seconds_from_midnight' => 'Seconds From Midnight',
			'minutes_from_midnight' => 'Minutes From Midnight',
			'is_dummy' => 'Is Dummy',
			'day_part_id' => 'Day Part',
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

		$criteria->compare('time_id',$this->time_id);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('second',$this->second);
		$criteria->compare('minute',$this->minute);
		$criteria->compare('hour',$this->hour);
		$criteria->compare('part_of_day',$this->part_of_day,true);
		$criteria->compare('seconds_from_midnight',$this->seconds_from_midnight);
		$criteria->compare('minutes_from_midnight',$this->minutes_from_midnight);
		$criteria->compare('is_dummy',$this->is_dummy,true);
		$criteria->compare('day_part_id',$this->day_part_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}