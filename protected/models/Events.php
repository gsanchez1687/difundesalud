<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $id
 * @property integer $promotor_id
 * @property string $name
 * @property string $institution
 * @property string $message
 * @property integer $ambulatory
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $municipality_id
 * @property integer $parishe_id
 * @property integer $active
 * @property string $observation
 *
 * The followings are the available model relations:
 * @property Days[] $days
 * @property Promotor $promotor
 * @property States $state
 * @property Cities $city
 * @property Municipalities $municipality
 * @property Parishes $parishe
 */
class Events extends CActiveRecordExt {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'events';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('promotor_id, name, state_id, municipality_id, parishe_id, message', 'required'),
            array('promotor_id, ambulatory, state_id, city_id, municipality_id, parishe_id, active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 500),
            array('flayer', 'length', 'max' => 200),
            array('institution', 'length', 'max' => 100),
            array('observation', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, promotor_id, name, institution, message, ambulatory, state_id, city_id, municipality_id, parishe_id, active, observation', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'days' => array(self::HAS_MANY, 'Days', 'event_id'),
            'fav' => array(self::HAS_MANY, 'UsersFavorites', 'event_id'),
            'promotor' => array(self::BELONGS_TO, 'Promotor', 'promotor_id'),
            'state' => array(self::BELONGS_TO, 'States', 'state_id'),
            'city' => array(self::BELONGS_TO, 'Cities', 'city_id'),
            'municipality' => array(self::BELONGS_TO, 'Municipalities', 'municipality_id'),
            'parishe' => array(self::BELONGS_TO, 'Parishes', 'parishe_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'promotor_id' => 'Promotor',
            'name' => 'Nombre',
            'institution' => 'Institucion',
            'message' => 'Direccion',
            'ambulatory' => 'Ambulatorio',
            'state_id' => 'Estado',
            'city_id' => 'City',
            'municipality_id' => 'Municipio',
            'parishe_id' => 'Parroquia',
            'active' => 'Estatus',
            'observation' => 'Observacion',
            'flayer' => 'Imagen del Evento (flyer)',
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
        $criteria->compare('promotor_id', $this->promotor_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('institution', $this->institution, true);
        $criteria->compare('message', $this->message, true);
        $criteria->compare('ambulatory', $this->ambulatory);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('municipality_id', $this->municipality_id);
        $criteria->compare('parishe_id', $this->parishe_id);
        $criteria->compare('active', $this->active);
        $criteria->compare('observation', $this->observation, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Events the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
   public static function fecha($date){

                if($date == '' || empty($date))
                    return '';
    
                $meses = array("Enero" , "Febrero" , "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre",
                "Noviembre", "Diciembre"); //Español
                
                /* $meses = array("Jan" , "Feb" , "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", 
                "Nov", "Dec");*/ //English
        
        list($anio, $mes, $dia) = preg_split('/-/', $date);
        
        $month = $meses[((int)$mes)-1];
        
       $fechaLegible = $dia[0].$dia[1]."  " . $month." ".$anio ; //Spanish 
        
        /* $fechaLegible = $month.' '.$dia.", ".$anio; */ //English 
        
        return $fechaLegible;
    }
    
      public static function tiempoTranscurridoFechas($fechaInicio, $fechaFin) {
        $fecha1 = new DateTime($fechaInicio);
        $fecha2 = new DateTime($fechaFin);
        $fecha = $fecha1->diff($fecha2);
        $tiempo = "";

        //años
        if ($fecha->y > 0) {
            $tiempo .= $fecha->y;

            if ($fecha->y == 1)
                $tiempo .= " año, ";
            else
                $tiempo .= " años, ";
        }

        //meses
        if ($fecha->m > 0) {
            $tiempo .= $fecha->m;

            if ($fecha->m == 1)
                $tiempo .= " mes, ";
            else
                $tiempo .= " meses, ";
        }

        //dias
        if ($fecha->d > 0) {
            $tiempo .= $fecha->d;

            if ($fecha->d == 1)
                $tiempo .= " día, ";
            else
                $tiempo .= " días, ";
        }

        //horas
        if ($fecha->h > 0) {
            $tiempo .= $fecha->h;

            if ($fecha->h == 1)
                $tiempo .= " hora, ";
            else
                $tiempo .= " horas, ";
        }

        //minutos
        if ($fecha->i > 0) {
            $tiempo .= $fecha->i;

            if ($fecha->i == 1)
                $tiempo .= " minuto";
            else
                $tiempo .= " minutos";
        }
        else if ($fecha->i == 0) //segundos
            $tiempo .= $fecha->s . " segundos";

        return $tiempo;
    }

}
