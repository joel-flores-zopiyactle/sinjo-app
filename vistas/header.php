<!DOCTYPE html>
<html>
<?php?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SINJO | Dashboard</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="../css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
<link href="../css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="../img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span id="usuario" class="block m-t-xs font-bold">David Williams</span>
                            <span id="rol" class="text-muted text-xs block">Administrador <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Perfil</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item"  href="../ajax/usuario.php?op=salir">Salir</a></li>

                            <a>
                      


                        </ul>
                    </div>
                    <div class="logo-element">
                        SINJO
                    </div>
                </li>
               
                <li class="active">
                    <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Tablero</span></a>
                </li>
                <li>
                    <a href="audienciaprivada.php"><i class="fa fa-th-large"></i> <span class="nav-label">Ingresar a audiencia</span></a>
                </li>

                <li>
                    <a href="expedientes.php"><i class="fa fa-th-large"></i> <span class="nav-label">Expedientes</span></a>
                </li>

                <li>
                    <a href="audiencias.php"><i class="fa fa-th-large"></i> <span class="nav-label">Audiencias</span></a>
                </li>
              
                <li>
                    <a href="calendario.php"><i class="fa fa-th-large"></i> <span class="nav-label">Calendario</span></a>
                </li>

                <li>
                    <a href="invitados.php"><i class="fa fa-th-large"></i> <span class="nav-label">Invitados</span></a>
                </li>

             
               

                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Adminitración</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="registros_acceso.php">Registros de acceso</a></li>
                        <li><a href="log_eventos.php">Log de eventos usuario</a></li>
                        <li><a href="administracion_audiencias.php">Administración de audiencias</a></li>
                       
                    </ul>
                </li>


               
                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Configuración</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="usuario.php">Usuarios</a></li>
                        <li><a href="salas.php">Salas</a></li>
                        <li><a href="roles.php">Roles</a></li>
                        
                        <li><a href="centrosjusticia.php">Centros de justicia</a></li>
                        <li><a href="catalogo_audiencias.php">Tipos de Audiencias</a></li>
                       
                    </ul>
                </li>

                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-th-large"></i> <span class="nav-label">Salir</span></a>
                </li>

                
               
                
               
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="index-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
              
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                
                


                <li>
                    <a href="../ajax/usuario.php?op=salir">
                        <i class="fa fa-sign-out"></i> Salir
                    </a>
                </li>
               
            </ul>

        </nav>
        </div>