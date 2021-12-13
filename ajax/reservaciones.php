<?php
    
    require_once '../modelos/Reservaciones.php';

   $reservacion = new Reservaciones();

   $numaudiencia=isset($_POST["numaudiencia"])? limpiarCadena($_POST["numaudiencia"]):"";
   $idsistema=isset($_POST["idsistema"])? limpiarCadena($_POST["idsistema"]):"";
   $fcelebracion=isset($_POST["fcelebracion"])? limpiarCadena($_POST["fcelebracion"]):"";
   $hinicio=isset($_POST["hinicio"])? limpiarCadena($_POST["hinicio"]):"";
   $hfinal=isset($_POST["hfinal"])? limpiarCadena($_POST["hfinal"]):"";
   $numunica=isset($_POST["numunica"])? limpiarCadena($_POST["numunica"]):"";
   $centroJusticia=isset($_POST["centroJusticia"])? limpiarCadena($_POST["centroJusticia"]):"";
   $sala=isset($_POST["sala"])? limpiarCadena($_POST["sala"]):"";
   $tipoAudiencia=isset($_POST["tipoAudiencia"])? limpiarCadena($_POST["tipoAudiencia"]):"";
   $idaud=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";  //ID AUDIENCIA DE CONFIRMACION
   
   $idsistema =Time();
   $inicio_normal = $fcelebracion." ".$hinicio;
    $final_normal = $fcelebracion." ".$hfinal;
    
    $token=$idsistema."SiJ".$numaudiencia;
    $token_invitado=$numaudiencia."I4N".$idsistema;
   

    

    switch($_GET["op"])
    {
        case 'numAudiencia': ///////////num audiencia
            $rspta =$reservacion->numAudiencia();
            echo json_encode($rspta);
        break;

        case 'guardaReservacionAudiencia':

                $respValida =$reservacion->validar_disponibilidad($sala,$fcelebracion,$hinicio,$hfinal);
                $row_cnt_validar = $respValida->num_rows;  // Valida si es 0 esta libre, si es 1 esta ocupado
               
                if($row_cnt_validar=='1')
                {

                    $valor= 'error';
                    echo $valor;
                   
                }else{
                    $rspta=$reservacion ->insertar_reserva($numaudiencia,$idsistema,$fcelebracion,$hinicio,$hfinal,$numunica,$centroJusticia,$sala,$tipoAudiencia,$inicio_normal,$final_normal,$token,$token_invitado);
                         if ($rspta =='1')
                            {
                            $rspta_control=$reservacion->cambia_control_audiencia($numaudiencia);
                           $conteo = count($_POST["userid"]);
                            for ($i=0; $i< $conteo ; $i++)
                                    {
                                        $respParticipantes =$reservacion->carga_participantes($numaudiencia,$_POST["userid"][$i],$_POST["idrol"][$i],$_POST["descripcion"][$i],$idsistema,$numunica,$token);
                                    }
                                    echo $numaudiencia;
                            }
                }

        break;

        case 'mostrarConfirmacion': ///////////num audiencia
            $rspta = $reservacion->mostrar_confirmacion($idaud);
            echo json_encode($rspta);
        break;
    }

    

?>