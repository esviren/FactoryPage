<?php

/**
 * This is the model class for table "tblAspirante".
 *
 * The followings are the available columns in table 'tblAspirante':
 * @property integer $aspId
 * @property integer $aspUsuarioId
 * @property string $aspEmpresa
 * @property integer $aspProyectoId
 * @property string $aspTecnologiaAD
 * @property integer $aspExperienciaAgil
 * @property string $aspComentario
 * @property integer $aspEstado
 *
 * The followings are the available model relations:
 * @property TblExperinciaAgil $aspExperienciaAgil0
 * @property TblProyectos $aspProyecto
 * @property TblUsuarios $aspUsuario
 */
class Aspirante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Aspirante the static model class
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
		return 'tblAspirante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aspUsuarioId, aspEmpresa,aspTecnologiaAD, aspExperienciaAgilId, aspComentario', 'required'),
			array('aspUsuarioId, aspProyectoId, aspExperienciaAgilId, aspEstado', 'numerical', 'integerOnly'=>true),
			array('aspEmpresa', 'length', 'max'=>95),
			array('aspTecnologiaAD', 'length', 'max'=>60),
			array('aspComentario', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aspId, aspUsuarioId, aspEmpresa, aspProyectoId, aspTecnologiaAD, aspExperienciaAgilId, aspComentario, aspEstado', 'safe', 'on'=>'search'),
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
			'aspExperienciaAgil' => array(self::BELONGS_TO, 'ExperinciaAgil', 'aspExperienciaAgilId'),
			'aspProyecto' => array(self::BELONGS_TO, 'Proyectos', 'aspProyectoId'),
			'aspUsuario' => array(self::BELONGS_TO, 'Usuarios', 'aspUsuarioId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aspId' => 'Id',
			'aspUsuarioId' => 'Usuario',
			'aspEmpresa' => 'Empresa o entidad a la que pertenece',
			'aspProyectoId' => 'Proyecto al que aspira',
			'aspTecnologiaAD' => 'Tecnologia de acceso a datos que meneja',
			'aspExperienciaAgilId' => 'Experiencia en metodologia Agil',
			'aspComentario' => 'Comentario generales o sujerencias',
			'aspEstado' => 'Estado',
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

		$criteria->compare('aspId',$this->aspId);
		$criteria->compare('aspUsuarioId',$this->aspUsuarioId);
		$criteria->compare('aspEmpresa',$this->aspEmpresa,true);
		$criteria->compare('aspProyectoId',$this->aspProyectoId);
		$criteria->compare('aspTecnologiaAD',$this->aspTecnologiaAD,true);
		$criteria->compare('aspExperienciaAgilId',$this->aspExperienciaAgilId);
		$criteria->compare('aspComentario',$this->aspComentario,true);
		$criteria->compare('aspEstado',$this->aspEstado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}