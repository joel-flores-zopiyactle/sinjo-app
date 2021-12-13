<?php require 'header.php'; ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Administración de salas</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Inicio</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            <strong>Administración de salas</strong>
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
                        <div class="ibox-title">
                        <button type="button" class="btn btn-w-m btn-info" onclick="mostrarform(true)">Nueva sala</button>
                        </div>
                        
                        <div class="ibox-content">

                            <div class="table-responsive"  id="listadoregistros">
                        <table id="tblistado" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Sala</th>
                            <th>Num Sala </th>
                            <th>Ubicación</th>
                            <th>Capacidad</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Acciones</th>
                            <th>Sala</th>
                            <th>Num Sala </th>
                            <th>Ubicación</th>
                            <th>Capacidad</th>
                        
                        </tr>
                        </tfoot>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!--Fin row-->

            <div class="row" id="formularioregistros">
                <div class="col-lg-12">
                    <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Nueva sala </h5>
                      
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <form name="formulario" id="formulario" method="post">
                                    <input type="hidden" name="idsala" id="idsala">
                                    <div class="form-group"><label>Numero de sala</label> <input type="text" id="numerosala" name="numerosala" placeholder=""  onkeyup="mayus(this);" class="form-control"></div>
                                    <div class="form-group"><label>Nombre sala</label> <input type="text" id="sala" name="sala" placeholder=""   onkeyup="mayus(this);" class="form-control"></div>
                                    <div class="form-group"><label>Ubicación</label> <input type="text" id="ubicacion" name="ubicacion" onkeyup="mayus(this);"  placeholder="" class="form-control"></div>
                                    
                                    <div class="form-group"><label>Capacidad</label> <input type="text" id="capacidad" name="capacidad"  onkeyup="mayus(this);" placeholder="" class="form-control"></div>
                                    <div>
                                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                     
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>

        </div>

        <?php   require 'footer.php';?>
        <script src="scripts/salas.js"></script>

       <!-- <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>  -->