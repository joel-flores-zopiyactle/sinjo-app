<?php require 'header.php'; ?>
<link href="../css/plugins/iCheck/custom.css" rel="stylesheet">

<link href="../css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="../css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Calendario</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Inicio</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>Calendario</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
       
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Calendario de audiencias </h5>
                    
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php   require 'footer.php';?>
        <script src="scripts/roles.js"></script>
        <script src="../js/plugins/fullcalendar/moment.min.js"></script>
        <script src="../js/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="../js/plugins/iCheck/icheck.min.js"></script>


        <script>

    $(document).ready(function() {

         

        /* initialize the external events
         -----------------------------------------------------------------*/


      


        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            eventLimit: true, 
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });


    });

</script>

      