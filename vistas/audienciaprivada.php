<?php
  //Activacion de almacenamiento en buffer
  ob_start();
  //iniciamos las variables de session
  session_start();

  if(!isset($_SESSION["nombre"]))
  {
    header("Location: login.html");
  }

  else  //Agrega toda la vista
  {
    require 'header.php';
    
?>

<div class="loginColumns animated fadeInDown">
    
        <div class="row">

           
            <div class="col-md-12">
                <div class="ibox-content">
                <h1 class="logo-name"><img src="../img/sinjo_logo.png" width="100%"></h1>
                    <form class="m-t" role="form" method="post" id="frmAccesoAudiencia">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="userid" value="<?=$_SESSION['idusuario'];?>">
                            <input type="text" class="form-control" id="idsistema" placeholder="ID SISTEMA" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="token" placeholder="TOKEN" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">ACCEDER</button>
                        
                    </form>
                       
                </div>
            </div>
        </div>
       
       
    </div>

       

        <?php
  
  require 'footer.php';
  

} //Llave de la condicion if de la variable de session




?>
  <script src="scripts/loginAudiencia.js"></script>

<?php
  
  ob_end_flush(); //liberar el espacio del buffer
?>
