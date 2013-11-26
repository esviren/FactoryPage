<?php

/**
 * This is the model class for table "tblArticulos".
 *
 * The followings are the available columns in table 'tblArticulos':
 * @property integer $artId
 * @property string $artNombre
 * @property string $artTitulo
 * @property string $artContenido
 * @property integer $artAutor
 * @property integer $artModificador
 * @property integer $artCategorias
 * @property integer $artEstado
 *
 * The followings are the available model relations:
 * @property TblUsuarios $artAutor0
 * @property TblCategorias $artCategorias0
 * @property TblUsuarios $artModificador0
 */
class Articulos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Articulos the static model class
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
		return 'tblArticulos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artId, artNombre, artTitulo, artContenido, artCategorias', 'required'),
			array('artId, artAutor, artModificador, artCategorias, artEstado', 'numerical', 'integerOnly'=>true),
			array('artNombre, artTitulo', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('artId, artNombre, artTitulo, artContenido, artAutor, artModificador, artCategorias, artEstado', 'safe', 'on'=>'search'),
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
			'artAutor0' => array(self::BELONGS_TO, 'TblUsuarios', 'artAutor'),
			'artCategorias0' => array(self::BELONGS_TO, 'TblCategorias', 'artCategorias'),
			'artModificador0' => array(self::BELONGS_TO, 'TblUsuarios', 'artModificador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'artId' => 'Art',
			'artNombre' => 'Art Nombre',
			'artTitulo' => 'Art Titulo',
			'artContenido' => 'Art Contenido',
			'artAutor' => 'Art Autor',
			'artModificador' => 'Art Modificador',
			'artCategorias' => 'Art Categorias',
			'artEstado' => 'Art Estado',
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

		$criteria->compare('artId',$this->artId);
		$criteria->compare('artNombre',$this->artNombre,true);
		$criteria->compare('artTitulo',$this->artTitulo,true);
		$criteria->compare('artContenido',$this->artContenido,true);
		$criteria->compare('artAutor',$this->artAutor);
		$criteria->compare('artModificador',$this->artModificador);
		$criteria->compare('artCategorias',$this->artCategorias);
		$criteria->compare('artEstado',$this->artEstado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}