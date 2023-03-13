<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="es">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pacecss/pacecss.css">        <!--css-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animatecss/animatecss.css">        <!--css-->     
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/jquery-1.11.3.min.js"></script>         
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/dropdownHover.js"></script> 
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pacejs/pacejs.js"></script> 
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">       
        <script>
            $(document).ready(function () {         
                $('.titulo').addClass('animated slideInLeft');       
                $('.zoomIn').addClass('animated zoomIn');       
            });
        </script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <nav class="navbar navbar-default helvetica_neueregular">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/site/index"><img  class="logo" alt="DifundeSalud" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-website.png"></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index"><?php echo Yii::t("app", "Inicio"); ?> <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/calendario"><?php echo Yii::t("app", "Calendario"); ?></a></li>                        
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/aplicacion"><?php echo Yii::t("app", "Aplicacion"); ?></a></li>     
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/nosotros"><?php echo Yii::t("app", "Nosotros"); ?></a></li>                          
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact"><?php echo Yii::t("app", "Contactos"); ?></a></li>                          
                    </ul>                       
                    <ul class="nav navbar-nav navbar-right">
                        <li><a><i class="fa fa-instagram"></i></a></li>
                        <li><a><i class="fa fa-twitter"></i></a></li>
                        <li><a><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/promotor/create"><?php echo Yii::t("app", "Regístrate"); ?></a></li>                          
                        <li><a href="#"><?php echo Yii::t("app", "Iniciar Sesion"); ?></a></li>                       
                        <li><a href="#"><?php echo Yii::t("app", "Ayuda"); ?></a></li>                       
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" id="page">
            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                <p>  Copyright &copy; <?php echo date('Y'); ?> DifundeSalud</p>
                <p> All Rights Reserved.</p>               
            </div><!-- footer -->

        </div><!-- page -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/bootstrap.min.js"></script> 
    </body>
</html>
