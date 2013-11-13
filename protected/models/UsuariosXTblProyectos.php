<?php

/**
 * This is the model class for table "tblUsuarios_X_tblProyectos".
 *
 * The followings are the available columns in table 'tblUsuarios_X_tblProyectos':
 * @property integer $usuProId
 * @property integer $tblUsuarios_usuId
 * @property integer $tblProyectos_proId
 * @property integer $usuProRoles
 *
 * The followings are the available model relations:
 * @property TblProyectos $tblProyectosPro
 * @property TblUsuarios $tblUsuariosUsu
 */
class UsuariosXTblProyectos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsuariosXTblProyectos the static model class
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
		return 'tblUsuarios_X_tblProyectos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuProId, tblUsuarios_usuId, tblProyectos_proId, usuProRoles', 'required'),
			array('usuProId, tblUsuarios_usuId, tblProyectos_proId, usuProRoles', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usuProId, tblUsuarios_usuId, tblProyectos_proId, usuProRoles', 'safe', 'on'=>'search'),
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
			'tblProyectosPro' => array(self::BELONGS_TO, 'TblProyectos', 'tblProyectos_proId'),
			'tblUsuariosUsu' => array(self::BELONGS_TO, 'TblUsuarios', 'tblUsuarios_usuId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuProId' => 'Usu Pro',
			'tblUsuarios_usuId' => 'Tbl Usuarios Usu',
			'tblProyectos_proId' => 'Tbl Proyectos Pro',
			'usuProRoles' => 'Usu Pro Roles',
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

		$criteria->compare('usuProId',$this->usuProId);
		$criteria->compare('tblUsuarios_usuId',$this->tblUsuarios_usuId);
		$criteria->compare('tblProyectos_proId',$this->tblProyectos_proId);
		$criteria->compare('usuProRoles',$this->usuProRoles);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}