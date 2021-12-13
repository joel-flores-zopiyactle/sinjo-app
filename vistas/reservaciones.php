<?php require 'header.php'; ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-7">
        <h2>Reservación de sala</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Reservaciones</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4" id="botonesConfirmacion">
        <div class="title-action">
            <a href="invoice_print.html" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
        </div>
    </div>
   
</div>

<div class="wrapper wrapper-content animated fadeInRight" id="hoja_reservacion">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>INFORMACIÓN DE LA AUDIENCIA <small></small></h5>
                   
                </div>
                <div class="ibox-content">
                    <form name="formInfoAudiencia" id="formInfoAudiencia" method="post">

                        <div class="form-group row"><label class="col-lg-3 col-form-label">NÚMERO DE AUDIENCIA</label>
                            <div class="col-lg-5"> <input id="numaudiencia" name="numaudiencia"  width="276" class="form-control" readonly /> </div>
                            
                        </div>

                        <div class="form-group  row"><label class="col-sm-3 col-form-label">EXPEDIENTE</label>
                            <div class="col-sm-5"><input type="text" id="numunica" name="numunica" class="form-control"></div>
                        </div>
                        

                        <div class="form-group row"><label class="col-sm-3 col-form-label">FECHA</label>
                                <div class="col-sm-5">  
                                    <input id="fcelebracion" name="fcelebracion" width="276" class="form-control" /> 
                                </div>
                        </div>

                        <div class="form-group row"><label class="col-sm-3 col-form-label">HORA INICIO</label>
                                <div class="col-sm-5">  
                                    <input id="hinicio" name="hinicio" width="276" class="form-control" /> 
                                </div>
                        </div>

                        <div class="form-group row"><label class="col-sm-3 col-form-label">HORA FINAL</label>
                                <div class="col-sm-5">  
                                    <input id="hfinal" name="hfinal" width="276" class="form-control" /> 
                                </div>
                        </div>

                       

                        <div class="form-group  row"><label class="col-sm-3 col-form-label">CENTRO DE JUSTICIA</label>
                            <div class="col-sm-5">                        
                                <select class="form-control " name="centroJusticia" id="centroJusticia">
                                </select>
                            </div>
                        </div>

                        <div class="form-group  row"><label class="col-sm-3 col-form-label">SALA</label>
                            <div class="col-sm-5">                        
                                <select class="form-control " name="sala" id="sala">
                                </select>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-3 col-form-label">TIPO DE AUDIENCIA</label>
                            <div class="col-sm-5">                        
                                <select class="form-control " name="tipoAudiencia" id="tipoAudiencia">
                                </select>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <table class="table table-bordered table-hover" id="invoiceItem">	
                                        <tr>
                                            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                            <th width="15%">Nombre</th>
                                            <th width="20%">Rol</th>
                                            <th width="15%">Descripcion</th>
                                        </tr>							
                                        <tr>
                                            <td><input class="itemRow" type="checkbox"></td>
                                            <td><select name="userid[]" id="userid" data-live-search="true" class="form-control selectpicker" required></select></td>	
                                        	
                                            <td><select name="idrol[]" id="idrol" data-live-search="true" class="form-control selectpicker" required></select></td>			
                                            <td><input type="text" name="descripcion[]" id="descripcion" class="form-control quantity" autocomplete="off"></td>
                                            
                                        </tr>						
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>
                                    <button class="btn btn-success" id="addRows" type="button">+ Agregar participantes </button>
                                </div>
                            </div>

                        
                       
                        <div class="hr-line-dashed"></div>
                       
                        
                        
                        
                       
                        
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm"   type="submit">Realizar reservación</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row" id="confirmacion">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
           

        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>CONFIRMACIÓN DE RESERVACIÓN DE SALA </h5>
                           
                        </div>
                        <div class="ibox-content">
                            <form method="get">
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">IDENTIFICADOR DE SISTEMA</label>
                                    <div class="col-sm-10"><span id="identificadorsistema">we</span> </div>
                                </div>
                               
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Help text</label>
                                    <div class="col-sm-10"><input type="text" class="form-control"> <span class="form-text m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Password</label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Placeholder</label>

                                    <div class="col-sm-10"><input type="text" placeholder="placeholder" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Disabled</label>

                                    <div class="col-lg-10"><input type="text" disabled="" placeholder="Disabled input here..." class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Static control</label>

                                    <div class="col-lg-10"><p class="form-control-static">email@example.com</p></div>
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

<script src="scripts/reservaciones.js"></script>

        

      