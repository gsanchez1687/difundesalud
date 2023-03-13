<link href='http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.css' rel='stylesheet' />
<link href='http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo Yii::app()->baseurl; ?>/js/fullcalendar/moment.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.js'></script>
<script src='<?php echo Yii::app()->baseurl; ?>/js/fullcalendar/fullcalendar-lang-es.js'></script>

<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'title',            
                right: 'month,basicWeek,basicDay, today, prev, next'
            },
            defaultDate: '<?php echo Date("Y-m-d");  ?>',
            editable: false,
            eventLimit: true,
            defaultView: 'month',
            events: [<?php echo $data; ?>]
    });
    });
</script>
<style>

    #calendar {
        max-width: 900px;
        margin: 0 auto;    
    }
    .dropzone, td.fc-other-month {
        background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.03) 25%, transparent 25%, transparent 50%, rgba(0, 0, 0, 0.03) 50%, rgba(0, 0, 0, 0.03) 75%, transparent 75%, transparent);
        background-color: #FAFCFD;
        background-size: 16px 16px;
    }
    .fc-event, .fc-agenda .fc-event-time, .fc-event a {

        padding: 4px 6px;

        background-color: #fff;

        border-color: #00ccff;

        color: #000;

    }



    .fc-event, .fc-event:hover, .ui-widget .fc-event {

        color: #000;

    }

    .fc-event {

    border-width: 0px 0px 0px 4px;

    margin-bottom: 3px;

    border-radius: 2px;

    padding: 5px 15px 5px 2px;

    background-image: linear-gradient(to bottom, #FFF 0px, #EDEDED 100%);

    box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);

}

.modal-dialog {
       width: 95%!important;
}
.modal-content{
    
    width: 95%!important;
}

</style>
<div id='calendar'></div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="detailviewagenda">            
        </div>
    </div>        
</div>
<script>
    /* Click a boton Delete en el GridView */

    jQuery(document).on('click', '#calendar a.fc-event', function() {        

        $('#myModal').modal({show: true});        

        url = '<?php echo Yii::app()->createUrl('site/detail'); ?>/' + $(this).attr('href');
                
         jQuery.ajax({
            'type':'POST',
            'url':url,
            'cache':false,
            'data':jQuery(this).parents("form").serialize(),
            'success':function(html){jQuery("#detailviewagenda").html(html)}
        });
        return false;

    });
        jQuery(document).on('click', '.favorito', function() {   

        

        url = $(this).attr('href');
                
         jQuery.ajax({
            'type':'POST',
            'url':url,
            'cache':false,
            'data':jQuery(this).parents("form").serialize(),
            'success':function(html){jQuery("#fav").html(html)}
        });
        return false;

    });


</script>
