<?php

/**
 * This is the model class for table "tblAcciones".
 *
 * The followings are the available columns in table 'tblAcciones':
 * @property integer $accId
 * @property string $accNombre
 * @property integer $accControladorId
 *
 * The followings are the available model relations:
 * @property TblControladores $accControlador
 */
class Acciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Acciones the static model class
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
		return 'tblAcciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accControladorId', 'numerical', 'integerOnly'=>true),
			array('accNombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('accId, accNombre, accControladorId', 'safe', 'on'=>'search'),
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
			'accControlador' => array(self::BELONGS_TO, 'TblControladores', 'accControladorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'accId' => 'Acc',
			'accNombre' => 'Nombre',
			'accControladorId' => 'Controlador',
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

		$criteria->compare('accId',$this->accId);
		$criteria->compare('accNombre',$this->accNombre,true);
		$criteria->compare('accControladorId',$this->accControladorId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}