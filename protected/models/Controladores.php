<?php

/**
 * This is the model class for table "tblControladores".
 *
 * The followings are the available columns in table 'tblControladores':
 * @property integer $conId
 * @property string $conNombre
 *
 * The followings are the available model relations:
 * @property TblAcciones[] $tblAcciones
 * @property TblPermisos[] $tblPermisoses
 */
class Controladores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Controladores the static model class
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
		return 'tblControladores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conNombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('conId, conNombre', 'safe', 'on'=>'search'),
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
			'tblAcciones' => array(self::HAS_MANY, 'TblAcciones', 'accControladorId'),
			'tblPermisoses' => array(self::HAS_MANY, 'TblPermisos', 'perControllerId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'conId' => 'Con',
			'conNombre' => 'Con Nombre',
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

		$criteria->compare('conId',$this->conId);
		$criteria->compare('conNombre',$this->conNombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}