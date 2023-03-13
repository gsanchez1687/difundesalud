<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
       
        $sql1 = "SELECT Event.name, State.name State, Municipality.name Municipality, Parishe.name Parishe, Event.message, Event.institution, Day.date,Day.date_max, Day.ini_hour, Day.fin_hour, Event.active"
        . " FROM events Event INNER JOIN days Day ON (Day.event_id = Event.id) "
        . " INNER JOIN states State ON (Event.state_id = State.id) "
        . " INNER JOIN municipalities Municipality ON (Event.municipality_id = Municipality.id) "
        . " INNER JOIN parishes Parishe ON (Event.parishe_id = Parishe.id) "
        . " WHERE  Event.active = 1  ORDER BY Day.id ASC  LIMIT 3  ";


        $mapas = Yii::app()->db->createCommand($sql1)->queryAll();
        
        $sql2 = "SELECT Event.name, State.name State, Municipality.name Municipality, Parishe.name Parishe, Event.message, Event.institution,Day.date, Day.ini_hour, Day.fin_hour, Event.active"
                . " FROM events Event INNER JOIN days Day ON (Day.event_id = Event.id) "
                . " INNER JOIN states State ON (Event.state_id = State.id) "
                . " INNER JOIN municipalities Municipality ON (Event.municipality_id = Municipality.id) "
                . " INNER JOIN parishes Parishe ON (Event.parishe_id = Parishe.id) "
                . " WHERE Event.active = 1 and Day.date BETWEEN  Day.date AND Day.date_max";

        $mapas2 = Yii::app()->db->createCommand($sql2)->queryAll();
        
        $this->render('index',array('mapas'=>$mapas,'mapas2'=>$mapas2));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionNosotros() {
        $this->render('nosotros');
    }

   
    public function actionAplicacion() {

        $this->render('aplicacion');
    }
    
        public function actionCalendario() {


       /* if (Yii::app()->user->id == NULL) {
            $this->redirect('site/login');
        }*/

        Yii::app()->params['menu'] = 'calendario';
        $listado = Events::model()->findAll();

        $data = "";
        $i = 10;
        foreach ($listado as $list) {

            $data .= '{';
            $data .= "title:'" . $list->name . "',";
            $data .= "url:'" . $list->id . "',";
            $data .= "id:'" . $list->id . "',";
            
            $fecha_inicio = Days::model()->find(array('condition'=>"event_id = '$list->id'",'order'=>'id ASC'));
            $fecha_fin = Days::model()->find(array('condition'=>"event_id = '$list->id'",'order'=>'id DESC'));
            
            $data .= "start:'" . $fecha_inicio->date . "',";
            $data .= "end:'" . $fecha_fin->date . "',";
            $data .= '},';
            $i++;
        }
        $data = substr($data, 0, -1);

        $listado = "{id:1,url:'#',title:'titulo',start:'2014-11-01',end:'2014-11-01'},";


        $this->render('calendar', array('data' => $data));
    }
    
        public function actionDetail($id = NULL){
        
        
        /* Evento */
        
        $sql = new CDbCriteria();
        
        $sql->with = array('state','municipality','parishe','promotor');
        
        $evento = Events::model()->find("id = '$id'");
        
        
        /* Dia */
        
        $dias = Days::model()->findAll(array('condition'=>"event_id = '$id'",'order'=>'id ASC'));
        
        $user = Yii::app()->user->id;
        $favorito = UsersFavorites::model()->find(array('select'=>'count(*) as id','condition'=>"user_id = '$user' AND event_id = '$id'"));
        
        if(@$favorito->id > 0){
            $fav = 0;
        } else {
            $fav = 1;
        }
        
        $this->renderPartial('detailagenda', array(
                'evento' => @$evento,
                  'dias' => @$dias,
            'fav'=>@$fav
                
            ));
    }
    
    
    public  function ActionComofunciona(){
        
        $this->render('comofunciona');
    }
    



}
