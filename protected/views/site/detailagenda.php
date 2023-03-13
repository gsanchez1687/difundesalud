<div class="modal-header">



    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>        



    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> <?php echo $evento->name; ?></h4>



</div>



<div class="modal-body">  

    

    

    <div class="row">

      

     <div class="col-xs-12">

         

         <table class="table table-bordered table-condensed">

        <tr>

            <th>Promocionado por:</th>

            <td><?php echo $evento->promotor->name; ?></td>

        </tr>

        </table>

        <table class="table table-bordered table-condensed">

            <tr style="background-color: #f1f1f1;"><td colspan="6"><h4>Direccion</h4></td></tr>

        <tr>

            <th>Estado</th>

            <td><?php echo @$evento->state->name; ?></td>

        

            <th>Municipio</th>

            <td><?php echo @$evento->municipality->name; ?></td>

        

            <th>Parroquia</th>

            <td><?php echo @$evento->parishe->name; ?></td>

        </tr>

        <tr>

            <th>Direccion</th>

            <td colspan="5"><?php echo $evento->message; ?></td>

        </tr>

    </table>

         

         <table class="table table-bordered table-condensed">

             <?php foreach ($dias as $d) { ?>

             <tr>

                 

                 <td><h4>Servicios para el dia <?php echo $d->date; ?></h4></td>

                 <th>Desde</th>

                 <td><?php echo $d->ini_hour; ?></td>

                 <?php if($d->fin_hour != '00:00:00') { ?>

                 <th>Hasta</th>

                 <td><?php echo $d->fin_hour; ?></td>

                 <?php } ?>

             </tr>

            

             <?php $lista = explode(',',$d->name) ?>

             <?php foreach ($lista as $p) { ?>

             <tr>

                 <td colspan="5"><?php echo $p; ?></td>

             </tr>

             <?php } ?>

             <?php } ?>

             

         </table>

         

         

    

     </div>

    </div>

</div>



<div class="modal-footer">







    <div class="row">



        <div class="col-xs-12 col-sm-6">



            <a class="btn btn-primary" href="#"><i class="fa fa-facebook-square"></i></a>



            <a class="btn btn-info" href="#"><i class="fa fa-twitter"></i></a>



            <a class="btn btn2-danger" href="#"><i class="fa fa-google-plus"></i></a>



            <a class="btn btn8-default" href="#"><i class="fa fa-envelope"></i></a>



        </div>



        <div class="col-xs-12 col-sm-6">







            <p class="text-right">

            <div id="fav" style="float: right;">

                <?php 

                if(Yii::app()->user->id != NULL){

                echo CHtml::link('<i class="fa fa-star-o"></i>', array('site/favorito','id'=>$evento->id,'val'=>$fav), array('id' => 'dialogsubmit', 'class' => ''.$fav==1?'btn9-default btn favorito ':'btn6-warning btn favorito ')); } ?>

</div>

                &Tab;&Tab;&Tab;&Tab;



                <?php echo CHtml::link('Cerrar', '#', array('id' => 'dialogclose', 'class' => 'btn btn9-default', 'data-dismiss' => 'modal')); ?>

<?php if($evento->flayer != NULL) {  ?>

                <a href="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $evento->flayer; ?>"class="btn btn9-default" target="_blank">Flyer del Evento</a>

  

          <?php } ?>

            </p>



        </div>



    </div>



</div>

