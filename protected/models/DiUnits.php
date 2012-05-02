<?php

/**
 * This is the model class for table "di_units".
 *
 * The followings are the available columns in table 'di_units':
 * @property integer $unit_id
 * @property string $unit_name
 * @property string $unit_mark
 *
 * The followings are the available model relations:
 * @property AggDay[] $aggDays
 * @property AggDayPart[] $aggDayParts
 * @property AggMonthDayPart[] $aggMonthDayParts
 * @property FSensorType[] $fSensorTypes
 * @property ProdSmsNotifications[] $prodSmsNotifications
 * @property ProdEmailNotifications[] $prodEmailNotifications
 */
class DiUnits extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiUnits the static model class
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
		return 'di_units';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_name', 'length', 'max'=>20),
			array('unit_mark', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('unit_id, unit_name, unit_mark', 'safe', 'on'=>'search'),
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
			'aggDays' => array(self::HAS_MANY, 'AggDay', 'unit_id'),
			'aggDayParts' => array(self::HAS_MANY, 'AggDayPart', 'unit_id'),
			'aggMonthDayParts' => array(self::HAS_MANY, 'AggMonthDayPart', 'unit_id'),
			'fSensorTypes' => array(self::HAS_MANY, 'FSensorType', 'unit_id'),
			'prodSmsNotifications' => array(self::HAS_MANY, 'ProdSmsNotifications', 'unit_id'),
			'prodEmailNotifications' => array(self::HAS_MANY, 'ProdEmailNotifications', 'unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'unit_id' => 'Unit',
			'unit_name' => 'Unit Name',
			'unit_mark' => 'Unit Mark',
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
		$criteria->compare('unit_name',$this->unit_name,true);
		$criteria->compare('unit_mark',$this->unit_mark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}