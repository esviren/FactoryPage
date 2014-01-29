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
			//array('usuImagen', 'file', 'types'=>'jpg, jpeg, png, gif'),
			array('usuNombre, usuApellido, usuEmail, usuUsuario, usuPassword, usuRole', 'required'),
			array('usuRole, usuEstado', 'numerical', 'integerOnly'=>true),
			array('usuNombre, usuApellido, usuTelefono, usuEmail, usuUsuario, usuPassword', 'length', 'max'=>45),
			//array('usuImagen', 'file','types'=>'jpg, jpeg, png, gif'),
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
			'tblUsuariosXTblProyectoses' => array(self::HAS_MANY, 'TblUsuariosXTblProyectos', 'tblUsuarios_usuId2'),
		);
	}

	public function nombreEstado()
	{
		return $this->usuEstado == 1? "Activo":"Inactivo";
	}

	public function nombreRol($id)
	{
		$model = new Usuarios;
		$usuRol = new CDbCriteria();
		$usuRol->select = 'rolNombre';
		$usuRol->condition = 'rolId = :a';
		$usuRol->params = array(':a'=>$id);
		$usuarioRol = Roles::model()->findAll($usuRol);
		
		$Rol=$usuarioRol[0]->rolNombre;
		
		return $Rol;

	}

	// SELECT i.intNombre
	// FROM tblIntereses AS i
	// JOIN tblUsuarios_X_tblIntereses AS ui ON i.intId = ui.tblIntereses_intId
	// JOIN tblUsuarios AS u ON u.usuId = ui.tblUsuarios_usuId
	// WHERE ui.tblUsuarios_usuId =1

	public function nombreInteres($id)
	{
		//$id=$_GET['id'];

		$count = Yii::app()->db->createCommand('SELECT count(i.intNombre) FROM tblIntereses AS i JOIN tblUsuarios_X_tblIntereses AS ui ON i.intId = ui.tblIntereses_intId JOIN tblUsuarios AS u ON u.usuId = ui.tblUsuarios_usuId WHERE ui.tblUsuarios_usuId ='.$id.'')->queryScalar();

		$list = Yii::app()->db->createCommand('SELECT i.intNombre FROM tblIntereses AS i JOIN tblUsuarios_X_tblIntereses AS ui ON i.intId = ui.tblIntereses_intId JOIN tblUsuarios AS u ON u.usuId = ui.tblUsuarios_usuId WHERE ui.tblUsuarios_usuId ='.$id.'')->queryAll();

		
		$dataProvider=new CSqlDataProvider($count, array(
	    'totalItemCount'=>$list,
	    'sort'=>array(
	        'attributes'=>array(
	             'Intereses',
	        ),
	    ),
	    'pagination'=>array(
	        'pageSize'=>10,
   		),
		));

		// return $dataProvider;
		// print_r('<pre>');
		// print_r($dataProvider);
		// exit();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuId' => 'Usu',
			'usuNombre' => 'Nombre',
			'usuApellido' => 'Apellido',
			'usuTelefono' => 'Telefono',
			'usuEmail' => 'Email',
			'usuUsuario' => 'Usuario',
			'usuPassword' => 'Password',
			'usuRole' => 'Rol',
			'usuEstado' => 'Estado',
			'usuImagen' => 'Imagen',
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