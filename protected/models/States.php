<?php

/**
 * This is the model class for table "states".
 *
 * The followings are the available columns in table 'states':
 * @property integer $id
 * @property string $name
 * @property string $iso_3166_2
 *
 * The followings are the available model relations:
 * @property Events[] $events
 */
class States extends CActiveRecordExt {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'states';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, iso_3166_2', 'required'),
            array('name', 'length', 'max' => 50),
            array('iso_3166_2', 'length', 'max' => 4),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, iso_3166_2', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'events' => array(self::HAS_MANY, 'Events', 'state_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'iso_3166_2' => 'Iso 3166 2',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('iso_3166_2', $this->iso_3166_2, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return States the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getListStates() {

        $data = States::model()->findAll(array(
            'select' => 'id, name',
            'order' => 'name ASC'
        ));

        return CHtml::listData($data, 'id', 'name');
    }

}
