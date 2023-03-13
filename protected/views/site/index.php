<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/geolicalizacion.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ghost_button/ghost-buttons.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/query.cookie.js"></script> 

<script>
    $(document).ready(function () {
        geolocalizacion();
    });

</script>

<div class="bs-example" data-example-id="carousel-with-captions">
    <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-captions" data-slide-to="1"></li>          
            <li data-target="#carousel-example-captions" data-slide-to="2"></li>          
            <li data-target="#carousel-example-captions" data-slide-to="3"></li>          
        </ol>

        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <div class="bg2">
                    <img alt="DifundeSalud_app" class="image1 apple visible-lg visible-md visible-sm" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/slide-2.png">
                    <div class="icon">
                        <i class=" visible-lg visible-sm visible-md fa fa-android fa-2x"></i>
                    </div>
                </div>
                <div class="carousel-caption">             
                    <?php echo CHtml::link('Aplicacion Android', array('site/aplicacion'), array('class' => 'ghost-button-semi-transparent btn-lg zoomIn')); ?>
                    <p>Descarga ya la aplicacion movil</p>
                </div>
            </div>

            <div class="item">
                <div class="bg1">
                    <img  alt="Como_funciona" class="image1 mac visible-lg visible-md visible-sm" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/slide-1.png">
                    <div class="icon">
                        <i class="visible-lg visible-sm  visible-md fa fa-bell fa-2x"></i>
                    </div>
                </div>           

                <div class="carousel-caption">
                    <?php echo CHtml::link('Como Funciona', array('/site/comofunciona'), array('class' => 'ghost-button-semi-transparent btn-lg zoomIn')); ?>
                    <p>Recibe Email y Notificaciones</p>
                </div>
            </div>
            
            <div class="item">
                <div class="bg3">
                    <img  alt="DifundeSalud_notificaciones" class="image1 mac visible-lg visible-md visible-sm" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/calendar.png">
                    <div class="icon">
                        <i class="visible-lg visible-sm  visible-md fa fa-calendar fa-2x"></i>
                    </div>
                </div>           

                <div class="carousel-caption">
                    <?php echo CHtml::link('Calendario de Eventos', array('/site/calendario'), array('class' => 'ghost-button-semi-transparent btn-lg zoomIn')); ?>
                    <p>Calendario de Eventos</p>
                </div>
            </div>
            
            <div class="item">
                <div class="bg4">
                    <img  alt="DifundeSalud_notificaciones" class="image1 mac visible-lg visible-md visible-sm" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/calendar.png">
                    <div class="icon">
                        <i class="visible-lg visible-sm  visible-md fa fa-bullhorn fa-2x"></i>
                    </div>
                </div>           

                <div class="carousel-caption">
                    <?php echo CHtml::link('Registrate como Promotor', array('/promotor/create'), array('class' => 'ghost-button-semi-transparent btn-lg zoomIn')); ?>
                    <p>Registrate como promotor para DifundeSalud</p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div><!-- /example -->
<?php
$doc = new DOMDocument();
foreach ($mapas as $mapa):
    @$cookie = $_COOKIE['nombre'];
    $direccion = $mapa['message'];   
    $xml = "https://maps.googleapis.com/maps/api/distancematrix/xml?origins=" . $cookie . "&destinations=" . $direccion . "&mode=driving&language=es-ES&sensor=true";
    $doc->load($xml);
    $persona = $doc->getElementsByTagName("duration");
    foreach ($persona as $p) {
        $duration = $p->getElementsByTagName("text");
        $duration = $duration->item(0)->nodeValue;
    }

    $persona2 = $doc->getElementsByTagName("distance");
    foreach ($persona2 as $p) {
        $distance = $p->getElementsByTagName("text");
        $distance = $distance->item(0)->nodeValue;
    }
    $des = $doc->getElementsByTagName("DistanceMatrixResponse");
    foreach ($des as $p) {
        $destination_address = $p->getElementsByTagName("destination_address");
        @$destination_address = $destination_address->item(0)->nodeValue;

        $origin_address = $p->getElementsByTagName("origin_address");
        @$origin_address = $origin_address->item(0)->nodeValue;
    }

    $ciudad[] = $destination_address;
    $origen[] = $origin_address;
    @$distancia[] = $distance;
    @$duracion[] = $duration;
    @$days[] = $mapa['date'];
    @$days2[] = $mapa['date_max'];
    @$ini_hour[] = $mapa['ini_hour'];
    @$fin_hour[] = $mapa['fin_hour'];
    @$names[] = $mapa['name'];
endforeach;
?>
<br />

<div class="row">
    <blockquote>
        <h2 class="robotothin">Encuentra la jornada mas cercana a tu localidad</h2>
        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
    </blockquote> 
</div>
<div class="row">    

    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">  
                <h3 class="panel-title helvetica_neueregular">Lista de las jornadas mas cercanas a tu localizacion Geografica </h3> 
            </div>
            <div class="panel-body">                
             <?php for ($i = 0; $i <= 2; $i++) { ?>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="heading<?php echo $i?>">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i?>" aria-expanded="true" aria-controls="collapseOne">
                                    <strong class="text-left"><?php echo @$names[$i]; ?></strong> 
                                    <strong class="text-right"><?php echo Events::fecha(@$days[$i])." hasta ".Events::fecha(@$days2[$i]); ?></strong> 
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $i?>">
                            <div class="panel-body">
                               
                                 <div class="row">
                                    <div class="col-md-2">
                                        <p>Nombre</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><?php echo @$names[$i]; ?></strong>
                                    </div>
                                </div>
                                 <div class="row">
                                <div class="col-md-2">
                                    <p>Ciudad</p>
                                </div>
                                <div class="col-md-6">
                                    <strong> <?php echo @$ciudad[$i]; ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Horarios</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><?php echo Events::fecha(@$days[$i])." hasta ".Events::fecha(@$days2[$i]); ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Hora Inicio</p>
                                </div>
                                <div class="col-md-6">
                                    <strong> <?php echo @$ini_hour[$i]; ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Hora Final</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>  <?php echo @$fin_hour[$i]; ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Distancia y Duracion</p>
                                </div>
                                <div class="col-md-6 col-sm-3">
                                    <strong><?php echo @$distancia[$i] . " " . @$duracion[$i]; ?></strong>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
             <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">

<?php $doc = new DOMDocument(); ?>

        <script>
            var map;
            function initialize() {
                var mapOptions = {
                    scaleControl: true,
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

<?php
$i = 0;
foreach ($mapas2 as $mapa):

    $direccion = $mapa['message'];
    $xml = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $direccion . "&sensor=true";
    $doc->load($xml);
    $persona = $doc->getElementsByTagName("result");
    foreach ($persona as $p) {
        $latitud = $p->getElementsByTagName("lat");
        $latitud = $latitud->item(0)->nodeValue;
        $longitud = $p->getElementsByTagName("lng");
        $longitud = $longitud->item(0)->nodeValue;
    }
    ?>

                        var marcador = new google.maps.Marker({
                            position: new google.maps.LatLng(<?php //echo $latitud ?>,<?php //echo $longitud ?>),
                            map: map,
                            title: 'csdcd',
                            icon: '<?php echo Yii::app()->request->baseUrl; ?>/images/mapicons/aed-2.png'
                        });

<?php endforeach; ?>

            }
            google.maps.event.addDomListener(window, 'load', initialize);

        </script>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title helvetica_neueregular">Localizando las jornadas en el mapa | <?php echo @$origen[0] ?></h3>
            </div>
            <div class="panel-body">
                <div id="map-canvas" style="width:100%; height:350px;"></div>
            </div>
        </div>
    </div>

</div>
