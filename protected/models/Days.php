<?php

/**
 * This is the model class for table "di_days".
 *
 * The followings are the available columns in table 'di_days':
 * @property string $date_id
 * @property string $date
 * @property string $date_type
 * @property integer $year
 * @property integer $month
 * @property integer $day
 * @property integer $quartal
 * @property integer $year_month
 * @property integer $day_of_the_year
 * @property integer $week_of_the_year
 * @property integer $day_of_the_week
 * @property string $name_day
 * @property string $name_day_short
 * @property string $name_month
 * @property string $name_month_short
 * @property integer $days_in_month
 * @property string $season
 * @property string $is_leap_year
 * @property string $is_weekend
 * @property string $is_work_day
 * @property string $is_last_day_of_month
 * @property string $is_dummy
 *
 * The followings are the available model relations:
 * @property FReadings[] $fReadings
 * @property AggDay[] $aggDays
 * @property DiGsn[] $diGsns
 * @property DiGsn[] $diGsns1
 * @property DiSensors[] $diSensors
 * @property DiSensors[] $diSensors1
 * @property DiGsnPrivileges[] $diGsnPrivileges
 * @property AggDayPart[] $aggDayParts
 */
class Days extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Days the static model class
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
		return 'di_days';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_id', 'required'),
			array('year, month, day, quartal, year_month, day_of_the_year, week_of_the_year, day_of_the_week, days_in_month', 'numerical', 'integerOnly'=>true),
			array('date_type', 'length', 'max'=>10),
			array('is_leap_year, is_weekend, is_work_day, is_last_day_of_month, is_dummy', 'length', 'max'=>1),
			array('date, name_day, name_day_short, name_month, name_month_short, season', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('date_id, date, date_type, year, month, day, quartal, year_month, day_of_the_year, week_of_the_year, day_of_the_week, name_day, name_day_short, name_month, name_month_short, days_in_month, season, is_leap_year, is_weekend, is_work_day, is_last_day_of_month, is_dummy', 'safe', 'on'=>'search'),
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
			'fReadings' => array(self::HAS_MANY, 'FReadings', 'date_id'),
			'aggDays' => array(self::HAS_MANY, 'AggDay', 'date_id'),
			'diGsns' => array(self::HAS_MANY, 'DiGsn', 'date_activated_id'),
			'diGsns1' => array(self::HAS_MANY, 'DiGsn', 'date_deactivated_id'),
			'diSensors' => array(self::HAS_MANY, 'DiSensors', 'date_activated_id'),
			'diSensors1' => array(self::HAS_MANY, 'DiSensors', 'date_deactivated_id'),
			'diGsnPrivileges' => array(self::HAS_MANY, 'DiGsnPrivileges', 'date_id_given'),
			'aggDayParts' => array(self::HAS_MANY, 'AggDayPart', 'date_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'date_id' => 'Date',
			'date' => 'Date',
			'date_type' => 'Date Type',
			'year' => 'Year',
			'month' => 'Month',
			'day' => 'Day',
			'quartal' => 'Quartal',
			'year_month' => 'Year Month',
			'day_of_the_year' => 'Day Of The Year',
			'week_of_the_year' => 'Week Of The Year',
			'day_of_the_week' => 'Day Of The Week',
			'name_day' => 'Name Day',
			'name_day_short' => 'Name Day Short',
			'name_month' => 'Name Month',
			'name_month_short' => 'Name Month Short',
			'days_in_month' => 'Days In Month',
			'season' => 'Season',
			'is_leap_year' => 'Is Leap Year',
			'is_weekend' => 'Is Weekend',
			'is_work_day' => 'Is Work Day',
			'is_last_day_of_month' => 'Is Last Day Of Month',
			'is_dummy' => 'Is Dummy',
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

		$criteria->compare('date_id',$this->date_id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('date_type',$this->date_type,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);
		$criteria->compare('day',$this->day);
		$criteria->compare('quartal',$this->quartal);
		$criteria->compare('year_month',$this->year_month);
		$criteria->compare('day_of_the_year',$this->day_of_the_year);
		$criteria->compare('week_of_the_year',$this->week_of_the_year);
		$criteria->compare('day_of_the_week',$this->day_of_the_week);
		$criteria->compare('name_day',$this->name_day,true);
		$criteria->compare('name_day_short',$this->name_day_short,true);
		$criteria->compare('name_month',$this->name_month,true);
		$criteria->compare('name_month_short',$this->name_month_short,true);
		$criteria->compare('days_in_month',$this->days_in_month);
		$criteria->compare('season',$this->season,true);
		$criteria->compare('is_leap_year',$this->is_leap_year,true);
		$criteria->compare('is_weekend',$this->is_weekend,true);
		$criteria->compare('is_work_day',$this->is_work_day,true);
		$criteria->compare('is_last_day_of_month',$this->is_last_day_of_month,true);
		$criteria->compare('is_dummy',$this->is_dummy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}