<?php require 'header.php'; ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Audiencias del sistema</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Inicio</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            <strong>Audiencias</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row"  id="listadoregistros">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <button type="button" class="btn btn-w-m btn-success" onclick="mostrarform(true)"> <i class="fa fa-plus-square"></i> PROGRAMAR AUDIENCIA</button>
                        </div>
                        
                        <div class="ibox-content">

                            <div class="table-responsive" >
                        <table id="tblistado" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th></th>
                            <th>NUM AUDIENCIA</th>
                            <th>EXPEDIENTE </th>
                            <th>INICIO </th>
                            <th>FINALIZA </th>
                            <th>TIPO AUDIENCIA </th>
                            <th>SALA </th>
                            <th>JUEZ</th>                         
                            <th>ESTADO </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                        <tfoot>
                        <tr>
                             <th></th>
                             <th>ID AUDIENCIA</th>
                            <th>EXPEDIENTE </th>
                            <th>INICIO </th>
                            <th>FINALIZA </th>
                            <th>TIPO AUDIENCIA </th>
                            <th>SALA </th>
                            <th>JUEZ</th>                         
                            <th>ESTADO </th>
                        
                        </tr>
                        </tfoot>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!--Fin row-->


            

            <div class="row" id="formularioaudiencias">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>INFORMACIÓN DE LA AUDIENCIA <small></small></h5>
                        
                        </div>
                        <div class="ibox-content">
                            <form name="formInfoAudiencia" id="formInfoAudiencia" method="post">

                               
                                <input type="hidden" id="token" name="token"  width="276" class="form-control"  />
                                <div class="form-group  row"><label class="col-sm-3 col-form-label">EXPEDIENTE</label>
                                    <div class="col-sm-5"><input type="text" id="expediente" name="expediente" onblur="cargaDatosExpediente($('#expediente').val())" onchange="BuscaNumAudiencia($('#expediente').val())"   class="form-control"></div>
                                </div>

                                <div class="form-group row"><label class="col-lg-3 col-form-label">NÚMERO DE AUDIENCIA</label>
                                    <div class="col-lg-2"> <input id="numaudiencia" name="numaudiencia"  width="276" class="form-control" readonly /> </div>
                                    
                                </div>

                                <div class="form-group row"><label class="col-lg-3 col-form-label">JUEZ</label>
                                    <div class="col-lg-5"> <input id="juez" name="juez"  width="276" class="form-control" /> </div>
                                    
                                </div>

                                <div class="form-group row"><label class="col-lg-3 col-form-label">JUZGADO</label>
                                    <div class="col-lg-5"> <input id="juzgado" name="juzgado"  width="276" class="form-control" /> </div>
                                    
                                </div>
                                <div class="form-group row"><label class="col-lg-3 col-form-label">ACTOR</label>
                                    <div class="col-lg-5"> <input id="actor" name="actor"  width="276" class="form-control" /> </div>
                                    
                                </div>
                                <div class="form-group row"><label class="col-lg-3 col-form-label">DEMANDADO</label>
                                    <div class="col-lg-5"> <input id="demandado" name="demandado"  width="276" class="form-control" /> </div>
                                    
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


                                <div class="form-group row"><label class="col-sm-3 col-form-label">FECHA</label>
                                <div class="col-sm-5">  
                                    <input id="fcelebracion" name="fcelebracion" width="276" class="form-control" /> 
                                </div>
                                </div>

                                <div class="form-group row"><label class="col-sm-3 col-form-label">HORA INICIO</label>
                                        <div class="col-sm-5">  

                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="text" name="hinicio" id="hinicio" class="form-control" >
                                            <span class="input-group-addon">
                                                <span class="fa fa-clock-o"></span>
                                            </span>
                                        </div>
                                            

                                          



                                        </div>
                                </div>

                                <div class="form-group row"><label class="col-sm-3 col-form-label">HORA FINAL</label>
                                        <div class="col-sm-5">  
                                             <div class="input-group clockpicker2" data-autoclose="true">
                                                <input type="text" name="hfinal" id="hfinal" class="form-control"  >
                                                <span class="input-group-addon">
                                                    <span class="fa fa-clock-o"></span>
                                                </span>
                                            </div>
                                        </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                     <div class="row" >
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                            <button class="btn btn-default delete" id="removeRows" type="button">- Borrar</button>
                                            <button class="btn btn-default" id="addRows" type="button">+ Agregar participantes </button>
                                        </div>
                                    </div>
                                    <br>
        
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

                                                    <td><input type="text" name="nombre[]" id="nombre" class="form-control quantity" autocomplete="off"></td>
                                                    
                                                    <td><select name="idrol[]" id="idrol" data-live-search="true" class="form-control selectpicker" required></select></td>			
                                                    <td><input type="text" name="descripcion[]" id="descripcion" class="form-control quantity" autocomplete="off"></td>
                                                    
                                                </tr>						
                                            </table>
                                        </div>
                                    </div>

                                  
                                
                                    <div class="form-group row">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <button class="btn btn-success "   type="submit"><i class="fa fa-save"></i> GUARDAR</button>
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
        <script src="scripts/audiencias.js"></script>

      