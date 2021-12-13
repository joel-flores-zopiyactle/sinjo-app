<?php
  //Activacion de almacenamiento en buffer
  ob_start();
  //iniciamos las variables de session
  session_start();

  if(!isset($_SESSION["nombre"]))
  {
    header("Location: login.html");
  }

  else  //Agrega toda la vista
  {
    require 'header.php';
    
?>


        <div class="wrapper wrapper-content">
        <div class="row">
            <?php
            if($_SESSION['Audiencias'] == 1)
            {?>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-success float-right">Mes</span>
                        <h5>Reservaciones</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">14</h1>
                        <div class="stat-percent font-bold text-success">10% <i class="fa fa-bolt"></i></div>
                        <small>Total reservaciones</small>
                    </div>
                </div>
            </div>
            <?php  }?>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-info float-right">Canceladas</span>
                        <h5>Audiencias</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">100</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                        <small>Audiencias</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-right">El día</span>
                        <h5>Reservaciones</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="no-margins">3</h1>
                                <div class="font-bold text-navy">RESERVACIONES<i class="fa fa-level-up"></i></div>
                            </div>
                            
                        </div>


                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
        <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Timeline</h5>
                            <span class="label label-primary">Audiencias al dia</span>
                            
                        </div>

                        <div class="ibox-content inspinia-timeline">

                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-3 date">
                                        <i class="fa fa-briefcase"></i>
                                        6:00 am
                                        <br/>
                                        <small class="text-navy">2 horas</small>
                                    </div>
                                    <div class="col-7 content no-top-border">
                                        <p class="m-b-xs"><strong>Sala de prueba</strong></p>

                                        <p>Audiencia Inicial</p>

                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-3 date">
                                        <i class="fa fa-briefcase"></i>
                                        12:00 am
                                        <br/>
                                        <small class="text-navy">1 hora</small>
                                    </div>
                                    <div class="col-7 content no-top-border">
                                        <p class="m-b-xs"><strong>Sala de prueba</strong></p>

                                        <p>AUDIENCIA MEDIDA CAUTELAR</p>

                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-3 date">
                                        <i class="fa fa-briefcase"></i>
                                        15:00 am
                                        <br/>
                                        <small class="text-navy">1 hora</small>
                                    </div>
                                    <div class="col-7 content no-top-border">
                                        <p class="m-b-xs"><strong>Sala de prueba</strong></p>

                                        <p>AUDIENCIA PRUEBA ANTICIPADA</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            

        </div>

        <div class="row">

      

        </div>


        </div>


       

        <?php
  
  require 'footer.php';

} //Llave de la condicion if de la variable de session




?>

<?php
  
  ob_end_flush(); //liberar el espacio del buffer
?>
