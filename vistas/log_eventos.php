<?php require 'header.php'; ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Log de eventos</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Inicio</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            <strong>Eventos</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                      
                        <div class="ibox-content">

                            <div class="table-responsive"  id="listadoregistros">
                        <table id="tblistado" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>ID USUARIO</th>
                            <th>FECHA </th>
                            <th>HORA </th>
                            <th>ESTATUS </th>
                           
                            
                        </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                        <tfoot>
                        <tr>
                            
                            <th>ID USUARIO</th>
                            <th>FECHA </th>
                            <th>HORA </th>
                            <th>ACTIVIDAD </th>
                        
                        </tr>
                        </tfoot>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!--Fin row-->

            

        </div>

        <?php   require 'footer.php';?>
        <script src="scripts/log_eventos.js"></script>

      