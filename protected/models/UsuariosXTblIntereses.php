<?php

/**
 * This is the model class for table "tblUsuarios_X_tblIntereses".
 *
 * The followings are the available columns in table 'tblUsuarios_X_tblIntereses':
 * @property integer $usuIntId
 * @property integer $tblUsuarios_usuId
 * @property integer $tblIntereses_intId
 *
 * The followings are the available model relations:
 * @property TblIntereses $tblInteresesInt
 * @property TblUsuarios $tblUsuariosUsu
 */
class UsuariosXTblIntereses extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsuariosXTblIntereses the static model class
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
		return 'tblUsuarios_X_tblIntereses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuIntId, tblUsuarios_usuId, tblIntereses_intId', 'required'),
			array('usuIntId, tblUsuarios_usuId, tblIntereses_intId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usuIntId, tblUsuarios_usuId, tblIntereses_intId', 'safe', 'on'=>'search'),
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
			'tblInteresesInt' => array(self::BELONGS_TO, 'TblIntereses', 'tblIntereses_intId'),
			'tblUsuariosUsu' => array(self::BELONGS_TO, 'TblUsuarios', 'tblUsuarios_usuId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuIntId' => 'Usu Int',
			'tblUsuarios_usuId' => 'Tbl Usuarios Usu',
			'tblIntereses_intId' => 'Tbl Intereses Int',
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

		$criteria->compare('usuIntId',$this->usuIntId);
		$criteria->compare('tblUsuarios_usuId',$this->tblUsuarios_usuId);
		$criteria->compare('tblIntereses_intId',$this->tblIntereses_intId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}