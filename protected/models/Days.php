<?php

/**

 * This is the model class for table "days".

 *

 * The followings are the available columns in table 'days':

 * @property integer $id

 * @property string $name

 * @property integer $event_id

 * @property string $date

 * @property string $ini_hour

 * @property string $fin_hour

 *

 * The followings are the available model relations:

 * @property Events $event

 * @property DaysServices[] $daysServices

 */
class Days extends CActiveRecordExt {

    /**

     * @return string the associated database table name

     */
    public function tableName() {
        return 'days';
    }

    public function rules() {

        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.

        return array(
            array('name, event_id, date, ini_hour, fin_hour', 'required'),
            array('event_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, event_id, date, ini_hour, fin_hour', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {

        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.

        return array(
            'event' => array(self::BELONGS_TO, 'Events', 'event_id'),
            'daysServices' => array(self::HAS_MANY, 'DaysServices', 'day_id'),
        );
    }

    /**

     * @return array customized attribute labels (name=>label)

     */
    public function attributeLabels() {

        return array(
            'id' => 'ID',
            'name' => 'Servicios Medicos',
            'event_id' => 'Evento',
            'date' => 'Fecha',
            'ini_hour' => 'Hora Inicio',
            'fin_hour' => 'Hora Fin',
            'allday' => 'Todo el dia'
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('event_id', $this->event_id);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('ini_hour', $this->ini_hour, true);
        $criteria->compare('fin_hour', $this->fin_hour, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__) {

        return parent::model($className);
    }

}
