<?php

/**
 * This is the model class for table "di_gsn_privileges".
 *
 * The followings are the available columns in table 'di_gsn_privileges':
 * @property integer $gsn_privilege_id
 * @property integer $date_id_given
 * @property integer $user_id
 * @property integer $gsn_id
 * @property string $time_privilege_given
 * @property string $is_active
 *
 * The followings are the available model relations:
 * @property DiDays $dateIdGiven
 * @property DiGsn $gsn
 * @property DiUsers $user
 */
class DiGsnPrivileges extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiGsnPrivileges the static model class
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
		return 'di_gsn_privileges';
	}
	
	public function beforeSave()
	{	
		$this->time_privilege_given = new CDbExpression('NOW()');
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
			array('date_id_given, user_id, gsn_id', 'numerical', 'integerOnly'=>true),
			array('is_active', 'length', 'max'=>1),
			array('time_privilege_given', 'safe'),
                        array('user_id, gsn_id','required'),
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gsn_privilege_id, date_id_given, user_id, gsn_id, time_privilege_given, is_active', 'safe', 'on'=>'search'),
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
			'dateIdGiven' => array(self::BELONGS_TO, 'DiDays', 'date_id_given'),
			'gsn' => array(self::BELONGS_TO, 'DiGsn', 'gsn_id'),
			'user' => array(self::BELONGS_TO, 'ProdUsers', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gsn_privilege_id' => 'Gsn Privilege',
			'date_id_given' => 'Date Id Given',
			'user_id' => 'User',
			'gsn_id' => 'Gsn',
			'time_privilege_given' => 'Time Privilege Given',
			'is_active' => 'Is Active',
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

		$criteria->compare('gsn_privilege_id',$this->gsn_privilege_id);
		$criteria->compare('date_id_given',$this->date_id_given);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('gsn_id',$this->gsn_id);
		$criteria->compare('time_privilege_given',$this->time_privilege_given,true);
		$criteria->compare('is_active',$this->is_active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}