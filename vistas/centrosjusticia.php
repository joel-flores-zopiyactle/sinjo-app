<?php require 'header.php'; ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Administración de centros de justicia</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Inicio</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            <strong>Centros de justicia</strong>
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
                        <button type="button" class="btn btn-w-m btn-info" onclick="mostrarform(true)">Agregar nuevo</button>
                        </div>
                        
                        <div class="ibox-content">

                            <div class="table-responsive"  id="listadoregistros">
                        <table id="tblistado" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Nombre</th>
                            <th>Descripcion </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Acciones</th>
                            <th>Nombre</th>
                            <th>Descripcion </th>
                        
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
                        <h5>Tipo de audiencia </h5>
                      
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <form name="formulario" id="formulario" method="post">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group"><label>Nombre:</label> <input type="text" id="nombre" name="nombre" placeholder=""  onkeyup="mayus(this);" class="form-control"></div>
                                   
                                    <div class="form-group"><label>Descripción</label> <input type="text" id="descripcion" name="descripcion"  onkeyup="mayus(this);" placeholder="" class="form-control"></div>
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
        <script src="scripts/centrosjusticia.js"></script>

      