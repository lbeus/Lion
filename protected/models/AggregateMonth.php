<?php

/**
 * This is the model class for table "agg_month_day_part".
 *
 * The followings are the available columns in table 'agg_month_day_part':
 * @property string $reading_id
 * @property integer $gsn_id
 * @property integer $sensor_id
 * @property integer $unit_id
 * @property integer $year
 * @property integer $month
 * @property integer $day_part_id
 * @property double $avg_value
 * @property double $avg_max_value
 * @property double $avg_min_value
 * @property double $avg_amplitude
 *
 * The followings are the available model relations:
 * @property DiDayPart $dayPart
 * @property DiGsn $gsn
 * @property DiSensors $sensor
 * @property DiUnits $unit
 */
class AggregateMonth extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AggregateMonth the static model class
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
		return 'agg_month_day_part';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gsn_id, sensor_id, unit_id, year, month, day_part_id', 'numerical', 'integerOnly'=>true),
			array('avg_value, avg_max_value, avg_min_value, avg_amplitude', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reading_id, gsn_id, sensor_id, unit_id, year, month, day_part_id, avg_value, avg_max_value, avg_min_value, avg_amplitude', 'safe', 'on'=>'search'),
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
			'dayPart' => array(self::BELONGS_TO, 'DiDayPart', 'day_part_id'),
			'gsn' => array(self::BELONGS_TO, 'DiGsn', 'gsn_id'),
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
			'reading_id' => 'Reading',
			'gsn_id' => 'Gsn',
			'sensor_id' => 'Sensor',
			'unit_id' => 'Unit',
			'year' => 'Year',
			'month' => 'Month',
			'day_part_id' => 'Day Part',
			'avg_value' => 'Avg Value',
			'avg_max_value' => 'Avg Max Value',
			'avg_min_value' => 'Avg Min Value',
			'avg_amplitude' => 'Avg Amplitude',
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
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);
		$criteria->compare('day_part_id',$this->day_part_id);
		$criteria->compare('avg_value',$this->avg_value);
		$criteria->compare('avg_max_value',$this->avg_max_value);
		$criteria->compare('avg_min_value',$this->avg_min_value);
		$criteria->compare('avg_amplitude',$this->avg_amplitude);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}