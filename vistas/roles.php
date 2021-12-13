<?php require 'header.php'; ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Administración de roles</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Inicio</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            <strong>Administración de roles</strong>
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
                            <th>Rol</th>
                            <th>Descripcion </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                        <tfoot>
                        <tr>
                             <th>Acciones</th>
                            <th>Rol</th>
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
                        <h5>Nuevo rol </h5>
                      
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <form name="formulario" id="formulario" method="post">
                                    <input type="hidden" name="idrol" id="idrol">
                                    <div class="form-group"><label>Nombre de rol</label> <input type="text" id="rolname" name="rolname" placeholder=""  onkeyup="mayus(this);" class="form-control"></div>
                                   
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
        <script src="scripts/roles.js"></script>

      