<?php

/**
 * This is the model class for table "tbl_municipio".
 *
 * The followings are the available columns in table 'tbl_municipio':
 * @property integer $mun_id
 * @property string $dep_codigo
 * @property string $mun_codigo
 * @property string $mun_nombre
 * @property string $mun_estado
 *
 * The followings are the available model relations:
 * @property TblEventos[] $tblEventoses
 * @property TblDepartamento $depCodigo
 */
class Municipio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_municipio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dep_codigo', 'length', 'max'=>2),
			array('mun_codigo, mun_estado', 'length', 'max'=>45),
			array('mun_nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mun_id, dep_codigo, mun_codigo, mun_nombre, mun_estado', 'safe', 'on'=>'search'),
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
			'tblEventoses' => array(self::HAS_MANY, 'Eventos', 'eveMunicipio'),
			'depCodigo' => array(self::BELONGS_TO, 'Departamento', 'dep_codigo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mun_id' => 'Mun',
			'dep_codigo' => 'Dep Codigo',
			'mun_codigo' => 'Mun Codigo',
			'mun_nombre' => 'Municipio',
			'mun_estado' => 'Mun Estado',
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

		$criteria->compare('mun_id',$this->mun_id);
		$criteria->compare('dep_codigo',$this->dep_codigo,true);
		$criteria->compare('mun_codigo',$this->mun_codigo,true);
		$criteria->compare('mun_nombre',$this->mun_nombre,true);
		$criteria->compare('mun_estado',$this->mun_estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Municipio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
