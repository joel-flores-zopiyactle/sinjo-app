<?php 
 
 require 'header.php'; ?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Expedientes</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Inicio</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            <strong>Expedientes</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row" id="listadoregistros">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <button type="button" class="btn btn-w-m btn-success" onclick="mostrarform(true)"> <i class="fa fa-plus-square"></i> NUEVO EXPEDIENTE</button>
                        </div>


                        
                        <div class="ibox-content">

                            <div class="table-responsive"  id="">
                        <table id="tblistado" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th></th>
                            <th>EXPEDIENTE</th>
                            <th>FECHA DE CREACIÓN </th>
                            <th>TIPO DE JUICIO </th>
                            <th>JUEZ </th>
                            <th>ACTOR </th>
                            <th>DEMANDADO </th>
                            <th>STATUS </th>
                          
                            
                        </tr>
                        </thead>
                        <tbody>
                    
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>EXPEDIENTE</th>
                            <th>FECHA DE CREACIÓN </th>
                            <th>TIPO DE JUICIO </th>
                            <th>JUEZ </th>
                            <th>ACTOR </th>
                            <th>DEMANDADO </th>
                            <th>STATUS </th>
                        
                        </tr>
                        </tfoot>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!--Fin row-->


            <div class="row" id="formularioexpediente">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>REGISTRO DE EXPEDIENTE</h5>                        
                        </div>
                        <div class="ibox-content">
                            <form name="formExpediente" id="formExpediente" method="post">
                                <div class="form-group row"><label class="col-lg-3 col-form-label">FOLIO</label>
                                    <div class="col-lg-1"> <input type="text" id="folio" name="folio"   class="form-control" readonly  /> </div>
                                    
                                </div>

                                <div class="form-group row"><label class="col-lg-3 col-form-label">FECHA DE REGISTRO</label>
                                    <div class="col-lg-5"> <input id="fechareg" name="fechareg"  data-date-format="dd/mm/yyyy"  width="276" class="form-control"  /> </div>
                                    
                                </div>
                                

                                <div class="form-group  row"><label class="col-sm-3 col-form-label">NO. EXPEDIENTE</label>
                                    <div class="col-sm-2"><input type="text" id="noexpediente" name="noexpediente" class="form-control"></div>/
                                    <div class="col-sm-2"><input type="text" id="anoexpediente" name="anoexpediente" class="form-control"></div>
                                </div>


                                <div class="form-group row"><label class="col-sm-3 col-form-label">JUZGADO</label>
                                        <div class="col-sm-5">  
                                            <input id="juzgado" name="juzgado" width="276" class="form-control" /> 
                                        </div>
                                </div>

                                <div class="form-group row"><label class="col-sm-3 col-form-label">TIPO DE JUCIO</label>
                                        <div class="col-sm-5">  
                                        <select class="form-control " name="tipojuicio" id="tipojuicio"> </select> 
                                        </div>
                                      
                                </div>

                                

                                <div class="form-group row"><label class="col-sm-3 col-form-label">JUEZ</label>
                                        <div class="col-sm-5">  
                                            <select class="form-control " name="selectjuez" id="selectjuez"> </select> 
                                        </div>
                                </div>

                                <div class="form-group row"><label class="col-sm-3 col-form-label">SECRETARIO</label>
                                        <div class="col-sm-5">  
                                            <select class="form-control " name="selectsecretario" id="selectsecretario"> </select> 
                                        </div>
                                </div>


                                <div class="form-group  row"><label class="col-sm-3 col-form-label">ACTOR</label>
                                    <div class="col-sm-5"><input type="text" id="actor" name="actor" class="form-control"></div>
                                </div>

                                <div class="form-group  row"><label class="col-sm-3 col-form-label">DEMANDADO</label>
                                    <div class="col-sm-5"><input type="text" id="demandado" name="demandado" class="form-control"></div>
                                </div>



                                

                               

                                <div class="hr-line-dashed"></div>


                            

                                  
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary "   type="submit"><i class="fa fa-save"></i> GUARDAR</button>
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
        <script src="scripts/expedientes.js"></script>

      