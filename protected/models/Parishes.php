<?php

/**
 * This is the model class for table "parishes".
 *
 * The followings are the available columns in table 'parishes':
 * @property integer $id
 * @property integer $municipality_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Events[] $events
 * @property Municipalities $municipality
 */
class Parishes extends CActiveRecordExt
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parishes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('municipality_id, name', 'required'),
			array('municipality_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, municipality_id, name', 'safe', 'on'=>'search'),
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
			'events' => array(self::HAS_MANY, 'Events', 'parishe_id'),
			'municipality' => array(self::BELONGS_TO, 'Municipalities', 'municipality_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'municipality_id' => 'Municipality',
			'name' => 'Name',
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
		$criteria->compare('municipality_id',$this->municipality_id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parishes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
             public static function getListParishes($id = NULL) {

                $id = intval($id);
                
        $data = Parishes::model()->findAll(array(
            'select' => 'id, name',
            'condition'=>'municipality_id = :id',
            'params'=>array(':id'=>$id),
            'order' => 'name ASC'
        ));

        return CHtml::listData($data, 'id', 'name');
    }
}
