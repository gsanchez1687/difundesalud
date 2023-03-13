<?php

/**
 * This is the model class for table "promotor".
 *
 * The followings are the available columns in table 'promotor':
 * @property integer $id
 * @property integer $promotor_type_id
 * @property integer $user_id
 * @property string $address
 * @property integer $state_id
 * @property integer $municipality_id
 * @property integer $parishe_id
 * @property string $name
 * @property integer $active
 * @property string $email
 * @property string $code_phone_office
 * @property string $number_phone_office
 * @property string $code_phone_personal
 * @property string $number_phone_personal
 * @property string $date
 * @property string $time
 * @property integer $userlast_id
 * @property string $date_last
 * @property string $time_last
 *
 * The followings are the available model relations:
 * @property Events[] $events
 * @property PromotorTypes $promotorType
 * @property Users $user
 * @property States $state
 * @property Municipalities $municipality
 * @property Parishes $parishe
 */
class Promotor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promotor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promotor_type_id, user_id, address, state_id, municipality_id, parishe_id, name, active, email, code_phone_office, number_phone_office, code_phone_personal, number_phone_personal, date, time', 'required'),
			array('promotor_type_id, user_id, state_id, municipality_id, parishe_id, active, userlast_id', 'numerical', 'integerOnly'=>true),
			array('code_phone_office, code_phone_personal', 'length', 'max'=>4),
			array('number_phone_office, number_phone_personal', 'length', 'max'=>7),
			array('date_last, time_last', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, promotor_type_id, user_id, address, state_id, municipality_id, parishe_id, name, active, email, code_phone_office, number_phone_office, code_phone_personal, number_phone_personal, date, time, userlast_id, date_last, time_last', 'safe', 'on'=>'search'),
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
			'events' => array(self::HAS_MANY, 'Events', 'promotor_id'),
			'promotorType' => array(self::BELONGS_TO, 'PromotorTypes', 'promotor_type_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'state' => array(self::BELONGS_TO, 'States', 'state_id'),
			'municipality' => array(self::BELONGS_TO, 'Municipalities', 'municipality_id'),
			'parishe' => array(self::BELONGS_TO, 'Parishes', 'parishe_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'promotor_type_id' => 'Promotor',
			'user_id' => 'Usuario',
			'address' => 'Dirreccion Detallada de la Jornada',
			'state_id' => 'Estado',
			'municipality_id' => 'Municipio',
			'parishe_id' => 'Parroquia',
			'name' => 'Nombre',
			'active' => 'Activo',
			'email' => 'Correo',
			'code_phone_office' => 'Codigo de Teléfono',
			'number_phone_office' => 'Numero de Teléfono',
			'code_phone_personal' => 'Codigp de Teléfono Personal',
			'number_phone_personal' => 'Numero de Teléfono Personal',
			'date' => 'Fecha',
			'time' => 'Tiempo',
			'userlast_id' => 'Userlast',
			'date_last' => 'Date Last',
			'time_last' => 'Time Last',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('promotor_type_id',$this->promotor_type_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('municipality_id',$this->municipality_id);
		$criteria->compare('parishe_id',$this->parishe_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('code_phone_office',$this->code_phone_office,true);
		$criteria->compare('number_phone_office',$this->number_phone_office,true);
		$criteria->compare('code_phone_personal',$this->code_phone_personal,true);
		$criteria->compare('number_phone_personal',$this->number_phone_personal,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('userlast_id',$this->userlast_id);
		$criteria->compare('date_last',$this->date_last,true);
		$criteria->compare('time_last',$this->time_last,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Promotor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
