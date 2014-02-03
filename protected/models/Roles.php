<?php

/**
 * This is the model class for table "tblRoles".
 *
 * The followings are the available columns in table 'tblRoles':
 * @property integer $rolId
 * @property string $rolNombre
 * @property integer $rolEstado
 *
 * The followings are the available model relations:
 * @property TblPermisos[] $tblPermisoses
 * @property TblUsuarios[] $tblUsuarioses
 */
class Roles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Roles the static model class
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
		return 'tblRoles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rolNombre', 'required'),
			array('rolEstado', 'numerical', 'integerOnly'=>true),
			array('rolNombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rolId, rolNombre, rolEstado', 'safe', 'on'=>'search'),
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
			'tblPermisoses' => array(self::HAS_MANY, 'TblPermisos', 'perRolesId'),
			'tblUsuarioses' => array(self::HAS_MANY, 'TblUsuarios', 'usuRole'),
		);
	}

	public function nombreEstado()
	{
		return $this->rolEstado == 1? "Activo":"Inactivo";
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rolId' => 'Id',
			'rolNombre' => 'Nombre',
			'rolEstado' => 'Estado',
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

		$criteria->compare('rolId',$this->rolId);
		$criteria->compare('rolNombre',$this->rolNombre,true);
		$criteria->compare('rolEstado',$this->rolEstado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}