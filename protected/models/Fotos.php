<?php

/**
 * This is the model class for table "tblFotos".
 *
 * The followings are the available columns in table 'tblFotos':
 * @property integer $fotId
 * @property string $fotUrl
 * @property string $fotDescripcion
 * @property integer $fotEvento
 *
 * The followings are the available model relations:
 * @property TblEventos $fotEvento0
 */
class Fotos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblFotos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fotUrl, fotDescripcion, fotEvento', 'required'),
			array('fotEvento', 'numerical', 'integerOnly'=>true),
			array('fotUrl', 'length', 'max'=>70),
			array('fotDescripcion', 'length', 'max'=>180),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fotId, fotUrl, fotDescripcion, fotEvento', 'safe', 'on'=>'search'),
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
			'fotEvento0' => array(self::BELONGS_TO, 'TblEventos', 'fotEvento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fotId' => 'Fot',
			'fotUrl' => 'Fot Url',
			'fotDescripcion' => 'Fot Descripcion',
			'fotEvento' => 'Fot Evento',
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

		$criteria->compare('fotId',$this->fotId);
		$criteria->compare('fotUrl',$this->fotUrl,true);
		$criteria->compare('fotDescripcion',$this->fotDescripcion,true);
		$criteria->compare('fotEvento',$this->fotEvento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fotos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
