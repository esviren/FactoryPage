<?php

/**
 * This is the model class for table "tblEventos".
 *
 * The followings are the available columns in table 'tblEventos':
 * @property integer $eveId
 * @property string $eveNombre
 * @property string $eveDescripcion
 * @property string $eveLugar
 * @property string $eveDireccion
 * @property integer $eveDepartamento
 * @property integer $eveMunicipio
 * @property integer $eveNumParticipantes
 * @property string $eveFechaInicio
 * @property string $eveFechaFin
 * @property string $eveHoraInicio
 * @property string $eveHoraFin
 * @property string $eveExpositor
 * @property integer $eveUsuario
 * @property integer $eveFase
 *
 * The followings are the available model relations:
 * @property TblUsuarios $eveUsuario0
 * @property TblFases $eveFase0
 * @property TblMunicipio $eveMunicipio0
 * @property TblFotos[] $tblFotoses
 */
class Eventos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblEventos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eveNombre, eveDescripcion, eveLugar, eveDireccion, eveDepartamento, eveMunicipio, eveNumParticipantes, eveFechaInicio, eveFechaFin, eveHoraInicio, eveHoraFin, eveExpositor, eveUsuario, eveFase', 'required'),
			array('eveDepartamento, eveMunicipio, eveNumParticipantes, eveUsuario, eveFase', 'numerical', 'integerOnly'=>true),
			array('eveNombre, eveLugar, eveDireccion, eveExpositor', 'length', 'max'=>60),
			array('eveDescripcion', 'length', 'max'=>250),
			array('eveHoraInicio, eveHoraFin', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eveId, eveNombre, eveDescripcion, eveLugar, eveDireccion, eveDepartamento, eveMunicipio, eveNumParticipantes, eveFechaInicio, eveFechaFin, eveHoraInicio, eveHoraFin, eveExpositor, eveUsuario, eveFase', 'safe', 'on'=>'search'),
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
			'eveUsuario0' => array(self::BELONGS_TO, 'Usuarios', 'eveUsuario'),
			'eveFase0' => array(self::BELONGS_TO, 'Fases', 'eveFase'),
			'eveMunicipio0' => array(self::BELONGS_TO, 'Municipio', 'eveMunicipio'),
			'tblFotoses' => array(self::HAS_MANY, 'Fotos', 'fotEvento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eveId' => 'id',
			'eveNombre' => 'Nombre',
			'eveDescripcion' => 'Descripcion',
			'eveLugar' => 'Lugar',
			'eveDireccion' => 'Direccion',
			'eveDepartamento' => 'Departamento',
			'eveMunicipio' => 'Municipio',
			'eveNumParticipantes' => 'Numero de Participantes',
			'eveFechaInicio' => 'Fecha de Inicio',
			'eveFechaFin' => 'Fecha Fin',
			'eveHoraInicio' => 'Hora de Inicio',
			'eveHoraFin' => 'Hora Fin',
			'eveExpositor' => 'Expositor',
			'eveUsuario' => 'Usuario',
			'eveFase' => 'Fase',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('eveId',$this->eveId);
		$criteria->compare('eveNombre',$this->eveNombre,true);
		$criteria->compare('eveDescripcion',$this->eveDescripcion,true);
		$criteria->compare('eveLugar',$this->eveLugar,true);
		$criteria->compare('eveDireccion',$this->eveDireccion,true);
		$criteria->compare('eveDepartamento',$this->eveDepartamento);
		$criteria->compare('eveMunicipio',$this->eveMunicipio);
		$criteria->compare('eveNumParticipantes',$this->eveNumParticipantes);
		$criteria->compare('eveFechaInicio',$this->eveFechaInicio,true);
		$criteria->compare('eveFechaFin',$this->eveFechaFin,true);
		$criteria->compare('eveHoraInicio',$this->eveHoraInicio,true);
		$criteria->compare('eveHoraFin',$this->eveHoraFin,true);
		$criteria->compare('eveExpositor',$this->eveExpositor,true);
		$criteria->compare('eveUsuario',$this->eveUsuario);
		$criteria->compare('eveFase',$this->eveFase);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Eventos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
