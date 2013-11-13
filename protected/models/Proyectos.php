<?php

/**
 * This is the model class for table "tblProyectos".
 *
 * The followings are the available columns in table 'tblProyectos':
 * @property integer $proId
 * @property string $proNombre
 * @property string $proDescripcion
 * @property string $proFechaPostulacion
 * @property string $proFechaInicio
 * @property string $proFechaFinal
 * @property string $proCantidadUsuarios
 * @property string $proCantidadMaximoUsuarios
 * @property string $proCantidadMinimaUsuarios
 * @property integer $proEstado
 * @property integer $tblFases_fasId
 *
 * The followings are the available model relations:
 * @property TblFases $tblFasesFas
 * @property TblUsuariosXTblProyectos[] $tblUsuariosXTblProyectoses
 */
class Proyectos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proyectos the static model class
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
		return 'tblProyectos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proId, proNombre, proDescripcion, proFechaPostulacion, proCantidadMaximoUsuarios, proCantidadMinimaUsuarios, tblFases_fasId', 'required'),
			array('proId, proEstado, tblFases_fasId', 'numerical', 'integerOnly'=>true),
			array('proNombre, proDescripcion, proFechaPostulacion, proFechaInicio, proFechaFinal, proCantidadUsuarios, proCantidadMaximoUsuarios, proCantidadMinimaUsuarios', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('proId, proNombre, proDescripcion, proFechaPostulacion, proFechaInicio, proFechaFinal, proCantidadUsuarios, proCantidadMaximoUsuarios, proCantidadMinimaUsuarios, proEstado, tblFases_fasId', 'safe', 'on'=>'search'),
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
			'tblFasesFas' => array(self::BELONGS_TO, 'TblFases', 'tblFases_fasId'),
			'tblUsuariosXTblProyectoses' => array(self::HAS_MANY, 'TblUsuariosXTblProyectos', 'tblProyectos_proId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'proId' => 'Pro',
			'proNombre' => 'Pro Nombre',
			'proDescripcion' => 'Pro Descripcion',
			'proFechaPostulacion' => 'Pro Fecha Postulacion',
			'proFechaInicio' => 'Pro Fecha Inicio',
			'proFechaFinal' => 'Pro Fecha Final',
			'proCantidadUsuarios' => 'Pro Cantidad Usuarios',
			'proCantidadMaximoUsuarios' => 'Pro Cantidad Maximo Usuarios',
			'proCantidadMinimaUsuarios' => 'Pro Cantidad Minima Usuarios',
			'proEstado' => 'Pro Estado',
			'tblFases_fasId' => 'Tbl Fases Fas',
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

		$criteria->compare('proId',$this->proId);
		$criteria->compare('proNombre',$this->proNombre,true);
		$criteria->compare('proDescripcion',$this->proDescripcion,true);
		$criteria->compare('proFechaPostulacion',$this->proFechaPostulacion,true);
		$criteria->compare('proFechaInicio',$this->proFechaInicio,true);
		$criteria->compare('proFechaFinal',$this->proFechaFinal,true);
		$criteria->compare('proCantidadUsuarios',$this->proCantidadUsuarios,true);
		$criteria->compare('proCantidadMaximoUsuarios',$this->proCantidadMaximoUsuarios,true);
		$criteria->compare('proCantidadMinimaUsuarios',$this->proCantidadMinimaUsuarios,true);
		$criteria->compare('proEstado',$this->proEstado);
		$criteria->compare('tblFases_fasId',$this->tblFases_fasId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}