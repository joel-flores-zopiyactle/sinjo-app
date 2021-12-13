<?php require 'header.php'; ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-7">
                    <h2>Administración de Usuarios</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Inicio</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            <strong>Usuarios</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4" id="botonesConfirmacion">
                    <div class="title-action">
                     <button type="button"  id="nvousuario"class="btn btn-w-m btn-info " onclick="mostrarform(true)">Agregar usuario</button>
                    </div>
                </div>
   
            </div>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                       
                        </div>
                        
                        <div class="ibox-content">

                            <div class="table-responsive"  id="listadoregistros">
                        <table id="tblistado" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Rol </th>
                            <th>Email </th>
                            <th>Estado </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Rol </th>
                            <th>Email </th>
                            <th>Estado </th>
                        
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
                        <h5>NUEVO USUARIO </h5>
                      
                    </div>
                    <div class="ibox-content">
                        
                        <form name="formulario" id="formulario" method="post">
                            <div class="row">
                                <div class="col-sm-6 ">
                                
                                        <input type="hidden" name="id" id="id">

                                        <div class="form-group row"><label class="col-lg-3 col-form-label">NOMBRE</label>
                                            <div class="col-lg-8"> <input id="nombre" name="nombre"  width="276" class="form-control"  /> </div>
                                        </div>
                                        <div class="form-group row"><label class="col-lg-3 col-form-label">TELÉFONO</label>
                                            <div class="col-lg-8"> <input id="telefono" name="telefono"   width="276" class="form-control"  /> </div>
                                        </div>
                                        <div class="form-group row"><label class="col-lg-3 col-form-label">CORREO</label>
                                            <div class="col-lg-8"> <input id="email" name="email"   width="276" class="form-control"  /> </div>
                                        </div>
                                        <div class="form-group row"><label class="col-lg-3 col-form-label">ROL</label>
                                            <div class="col-lg-8">  <select class="form-control " name="idrol" id="idrol"> </select> </div>
                                        </div>
                                    
                            
                                </div>

                                <div class="col-sm-6 ">
                                        <div class="form-group row"><label class="col-lg-3 col-form-label">USUARIO</label>
                                            <div class="col-lg-8"> <input id="usuario" name="usuario"  width="276" class="form-control"  /> </div>
                                        </div>
                                        <div class="form-group row"><label class="col-lg-3 col-form-label">PASSWORD</label>
                                            <div class="col-lg-8"> <input id="password" name="password"  width="276" class="form-control"  /> </div>
                                        </div>
                                        <div class="form-group row"><label class="col-lg-3 col-form-label">CONFIRMAR PASSWORD</label>
                                            <div class="col-lg-8"> <input id="password" name="password"   width="276" class="form-control"  /> </div>
                                        </div>

                                        <div class="form-group row"><label class="col-lg-3 col-form-label">IMAGEN</label>
                                            <div class="col-lg-8"> 
                                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                                    <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                                                     <img src="" width="150px" height="120px" id="imagenmuestra"> </div>
                                        </div>
                            
                                    
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 ">
                                
                                        <!-- <div class="form-group row"><label class="col-lg-3 col-form-label">PERMISOS</label>
                                            <ul style="list-style:none;" id="permisos">
                                        </div> -->
                                       
                                    
                            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 ">
                                
                                       
                                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                                        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                      
                                    
                            
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                </div>
                
            </div>



        </div>

        <?php   require 'footer.php';?>
        <script src="scripts/usuario.js"></script>
      