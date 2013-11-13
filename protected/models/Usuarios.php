<?php

/**
 * This is the model class for table "tblUsuarios".
 *
 * The followings are the available columns in table 'tblUsuarios':
 * @property integer $usuId
 * @property string $usuNombre
 * @property string $usuApellido
 * @property string $usuTelefono
 * @property string $usuEmail
 * @property string $usuUsuario
 * @property string $usuPassword
 * @property integer $usuRole
 * @property integer $usuEstado
 * @property string $usuImagen
 *
 * The followings are the available model relations:
 * @property TblArticulos[] $tblArticuloses
 * @property TblArticulos[] $tblArticuloses1
 * @property TblRoles $usuRole0
 * @property TblUsuariosXTblIntereses[] $tblUsuariosXTblIntereses
 * @property TblUsuariosXTblProyectos[] $tblUsuariosXTblProyectoses
 */
class Usuarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
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
		return 'tblUsuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuNombre, usuApellido, usuEmail, usuUsuario, usuPassword, usuRole', 'required'),
			array('usuRole, usuEstado', 'numerical', 'integerOnly'=>true),
			array('usuNombre, usuApellido, usuTelefono, usuEmail, usuUsuario, usuPassword', 'length', 'max'=>45),
			array('usuImagen', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usuId, usuNombre, usuApellido, usuTelefono, usuEmail, usuUsuario, usuPassword, usuRole, usuEstado, usuImagen', 'safe', 'on'=>'search'),
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
			'tblArticuloses' => array(self::HAS_MANY, 'TblArticulos', 'artAutor'),
			'tblArticuloses1' => array(self::HAS_MANY, 'TblArticulos', 'artModificador'),
			'usuRole0' => array(self::BELONGS_TO, 'TblRoles', 'usuRole'),
			'tblUsuariosXTblIntereses' => array(self::HAS_MANY, 'TblUsuariosXTblIntereses', 'tblUsuarios_usuId'),
			'tblUsuariosXTblProyectoses' => array(self::HAS_MANY, 'TblUsuariosXTblProyectos', 'tblUsuarios_usuId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuId' => 'Usu',
			'usuNombre' => 'Usu Nombre',
			'usuApellido' => 'Usu Apellido',
			'usuTelefono' => 'Usu Telefono',
			'usuEmail' => 'Usu Email',
			'usuUsuario' => 'Usu Usuario',
			'usuPassword' => 'Usu Password',
			'usuRole' => 'Usu Role',
			'usuEstado' => 'Usu Estado',
			'usuImagen' => 'Usu Imagen',
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

		$criteria->compare('usuId',$this->usuId);
		$criteria->compare('usuNombre',$this->usuNombre,true);
		$criteria->compare('usuApellido',$this->usuApellido,true);
		$criteria->compare('usuTelefono',$this->usuTelefono,true);
		$criteria->compare('usuEmail',$this->usuEmail,true);
		$criteria->compare('usuUsuario',$this->usuUsuario,true);
		$criteria->compare('usuPassword',$this->usuPassword,true);
		$criteria->compare('usuRole',$this->usuRole);
		$criteria->compare('usuEstado',$this->usuEstado);
		$criteria->compare('usuImagen',$this->usuImagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}