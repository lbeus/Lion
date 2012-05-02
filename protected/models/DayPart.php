<?php

/**
 * This is the model class for table "di_day_part".
 *
 * The followings are the available columns in table 'di_day_part':
 * @property integer $day_part_id
 * @property string $day_part_name
 * @property string $start_time
 * @property string $finish_time
 *
 * The followings are the available model relations:
 * @property AggDayPart[] $aggDayParts
 * @property AggMonthDayPart[] $aggMonthDayParts
 */
class DayPart extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DayPart the static model class
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
		return 'di_day_part';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('day_part_id', 'required'),
			array('day_part_id', 'numerical', 'integerOnly'=>true),
			array('day_part_name', 'length', 'max'=>15),
			array('start_time, finish_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('day_part_id, day_part_name, start_time, finish_time', 'safe', 'on'=>'search'),
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
			'aggDayParts' => array(self::HAS_MANY, 'AggDayPart', 'day_part_id'),
			'aggMonthDayParts' => array(self::HAS_MANY, 'AggMonthDayPart', 'day_part_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'day_part_id' => 'Day Part',
			'day_part_name' => 'Day Part Name',
			'start_time' => 'Start Time',
			'finish_time' => 'Finish Time',
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

		$criteria->compare('day_part_id',$this->day_part_id);
		$criteria->compare('day_part_name',$this->day_part_name,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('finish_time',$this->finish_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}