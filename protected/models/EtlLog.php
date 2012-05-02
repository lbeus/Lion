<?php

/**
 * This is the model class for table "etl_log".
 *
 * The followings are the available columns in table 'etl_log':
 * @property integer $gsn_id
 * @property integer $sensor_id
 * @property string $time_of_reading
 */
class EtlLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EtlLog the static model class
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
		return 'etl_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gsn_id, sensor_id', 'required'),
			array('gsn_id, sensor_id', 'numerical', 'integerOnly'=>true),
			array('time_of_reading', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gsn_id, sensor_id, time_of_reading', 'safe', 'on'=>'search'),
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
			'gsn_id' => 'Gsn',
			'sensor_id' => 'Sensor',
			'time_of_reading' => 'Time Of Reading',
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
		$criteria->compare('sensor_id',$this->sensor_id);
		$criteria->compare('time_of_reading',$this->time_of_reading,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}