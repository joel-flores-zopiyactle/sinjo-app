<?php require 'header.php'; ?>

<div class="wrapper wrapper-content animated fadeIn">

<div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

            <div class="ibox-content">
                        <div class="row" >
                            <div class="col-12" style="text-align:center">
                                <h2 id="audiencia">AUDIENCIA X </H2>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-12" style="text-align:center">
                                <h3 id="centrojusticia">CENTRO DE JUSTICIA DE MONTERREY </H3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <small class="stats-label">NÚMERO ÚNICO DE CAUSA</small>
                                <h4 id="numcausa">1</h4>
                            </div>

                            <div class="col-4">
                                <small class="stats-label">NÚMERO DE AUDIENCIA</small>
                                <h4 id="numaudiencia">4</h4>
                            </div>
                            <div class="col-4">
                                <small class="stats-label">ID DE SISTEMA</small>
                                <h4 id="idsistema">2</h4>
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
                            <h5>AUDIENCIA</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="row" style="text-align:center">
                                <div class="col-12">
                                    <img src="../img/espera.png"/>
                                </div>
                            </div>
                            <br>

                            <div class="row" style="text-align:center">
                                <div class="col-12">
                                <button class="btn btn-primary " type="button"><i class="fa fa-video-camera"></i>&nbsp;INICIAR</button>
                                <button class="btn btn-warning " type="button"><i class="fa fa-pause"></i>&nbsp;PAUSAR</button>
                                <button class="btn btn-danger " type="button"><i class="fa fa-stop"></i>&nbsp;DETENER</button>                                   
                                   
                                </div>
                            </div>

                        </div>
                    </div>
    </div>


    <div class="col-lg-6">
        <div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> PARTICIPANTES</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">NOTAS</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-3">ARCHIVOS</a></li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active">
                    <div class="panel-body">

                    <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>ASISTENCIA</h5>
                                        
                                    </div>
                                    <div class="ibox-content table-responsive">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Asistencia</th>
                                                <th>Nombre</th>
                                                <th>Rol</th>
                                                <th>Descripción</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><span class="label label-primary">PRESENTE</span> </td>
                                                <td> Alberto Rodriguez gzman</td>
                                                <td>Juez</td>
                                                <td> </td>
                                            </tr>

                                            <tr>
                                                <td><span class="label label-primary">PRESENTE</span> </td>
                                                <td> Alberto Rodriguez gzman</td>
                                                <td>Juez</td>
                                                <td> </td>
                                            </tr>

                                            <tr>
                                                <td><span class="label label-success">AUSENTE</span> </td>
                                                <td><i class="fa fa-clock-o"></i> Carlos Guzman Hdz</td>
                                                <td>Testigo</td>
                                                <td >Testigo protegido</td>
                                            </tr>

                                           
                                            <tr>
                                                <td><span class="label label-warning">FALTA</span> </td>
                                                <td><i class="fa fa-clock-o"></i> Carlos Guzman Hdz</td>
                                                <td>Testigo</td>
                                                <td >Testigo protegido</td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                </div>
                <div role="tabpanel" id="tab-2" class="tab-pane">
                    <div class="panel-body">


                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>NOTAS</h5>
                                   
                                </div>
                                <div class="ibox-content">
                                    <form method="get">
                                        <div class="form-group  row"><label class="col-sm-2 col-form-label">NOTA:</label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                            
                                            <div class="col-sm-10">
                                                <input type="checkbox" id="checkbox1" >
                                                <label for="checkbox1">
                                                    NOTA PERSONAL
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                    </div>
                    
                </div>

                <div role="tabpanel" id="tab-3" class="tab-pane">
                    <div class="panel-body">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Archivos</h5>
                            
                        </div>
                        <div class="ibox-content">
                                <div class="custom-file">
                                    <input id="logo" type="file" class="custom-file-input">
                                    <label for="logo" class="custom-file-label selected"></label>
                                </div>
                               <br>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary btn-sm" type="submit">Enviar</button>
                                    </div>
                                </div>


                                

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    
</div>



</div>

        <?php   require 'footer.php';?>
        <script src="scripts/audiencias.js"></script>

      