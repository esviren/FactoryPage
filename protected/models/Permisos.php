<?php

/**
 * This is the model class for table "tblPermisos".
 *
 * The followings are the available columns in table 'tblPermisos':
 * @property integer $perId
 * @property integer $perRolesId
 * @property integer $perControllerId
 * @property string $perAccion
 * @property string $perEstado
 *
 * The followings are the available model relations:
 * @property TblControladores $perController
 * @property TblRoles $perRoles
 */
class Permisos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Permisos the static model class
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
		return 'tblPermisos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perRolesId, perControllerId', 'numerical', 'integerOnly'=>true),
			array('perAccion', 'length', 'max'=>50),
			array('perEstado', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('perId, perRolesId, perControllerId, perAccion, perEstado', 'safe', 'on'=>'search'),
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
			'perController' => array(self::BELONGS_TO, 'Controladores', 'perControllerId'),
			'perRoles' => array(self::BELONGS_TO, 'Roles', 'perRolesId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'perId' => 'Per',
			'perRolesId' => 'Roles',
			'perControllerId' => 'Controller',
			'perAccion' => 'Accion',
			'perEstado' => 'Estado',
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

		$criteria->compare('perId',$this->perId);
		$criteria->compare('perRolesId',$this->perRolesId);
		$criteria->compare('perControllerId',$this->perControllerId);
		$criteria->compare('perAccion',$this->perAccion,true);
		$criteria->compare('perEstado',$this->perEstado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}