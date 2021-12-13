<?php



     date_default_timezone_set('America/Mexico_City');
    require_once '../modelos/Audiencias.php';
    require_once '../modelos/Consultas.php';

   $consulta = new Consultas();

   $audiencias = new Audiencias();
   $expediente=isset($_POST["expediente"])? limpiarCadena($_POST["expediente"]):"";
   
    $idtipaudiencia=isset($_POST["idtipaudiencia"])? limpiarCadena($_POST["idtipaudiencia"]):"";
    $nameaudiencia=isset($_POST["tipaudiencianame"])? limpiarCadena($_POST["tipaudiencianame"]):"";
    $descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
    $id_reservacion_sala=isset($_POST["id_reservacion_sala"])? limpiarCadena($_POST["id_reservacion_sala"]):"";

    $numaudiencia=isset($_POST["numaudiencia"])? limpiarCadena($_POST["numaudiencia"]):"";


    $centroJusticia=isset($_POST["centroJusticia"])? limpiarCadena($_POST["centroJusticia"]):"";
    $sala=isset($_POST["sala"])? limpiarCadena($_POST["sala"]):"";
    $tipoAudiencia=isset($_POST["tipoAudiencia"])? limpiarCadena($_POST["tipoAudiencia"]):"";
    $fcelebracion=isset($_POST["fcelebracion"])? limpiarCadena($_POST["fcelebracion"]):"";
    $hinicio=isset($_POST["hinicio"])? limpiarCadena($_POST["hinicio"]):"";
    $hfinal=isset($_POST["hfinal"])? limpiarCadena($_POST["hfinal"]):"";
    $tokenAudiencia=isset($_POST["token"])? limpiarCadena($_POST["token"]):"";
    $tokeninvitado=isset($_POST["tokeninvitado"])? limpiarCadena($_POST["tokeninvitado"]):"";
    $idaudiencia=isset($_POST["idaudiencia"])? limpiarCadena($_POST["idaudiencia"]):"";
    

    
    $hora_actual =date('H:i:s');

    
    $fecha_actual = date('Y/m/d');
    

    $idsistema = time();
    $inicio = $fcelebracion." ".$hinicio;
    $fin = $fcelebracion." ".$hfinal;


    switch($_GET["op"])
    {


      


        case 'guardaryeditar':

     
              
                $rspta=$audiencias ->insertar($numaudiencia,$centroJusticia,$sala,$tipoAudiencia,$inicio,$fin,$expediente,$idsistema,$tokenAudiencia,$tokeninvitado);
                $rspta_token=$audiencias ->insertar_tokenAudiencia($tokenAudiencia);
                $rspta_tokeninvitado=$audiencias ->insertar_tokenInvitado($tokeninvitado);
               
                $cons=$consulta->registrar_actividad('1',$fecha_actual,$hora_actual,'NUEVA AUDIENCIA');
                $rspta_Numaudiencias = $audiencias->insertarNumAudiencia($numaudiencia,$expediente);

                $conteo = count($_POST["nombre"]);

                for ($i=0; $i< $conteo ; $i++)
                {
                    $rsptaParticipantes =$audiencias->guarda_participantes($_POST["nombre"][$i],$_POST["idrol"][$i],$_POST["descripcion"][$i],$expediente,$numaudiencia);
                }
                
             
                
                echo $rspta ? "Audiencia registrada" : "No se ha podido registrar";                
           
        break;

      

        case 'eliminar':
            $rspta =$audiencias->Eliminar($idtipaudiencia);
            echo $rspta ? "Rol eliminada" : "No se puede eliminar esta sala";
        break;

        case 'generarToken':
           $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $token = generate_string($permitted_chars, 8);
           
            $rspta =$audiencias->VerificaToken($token);
            if ($rspta == "")
            {
                echo $token;
            }else{
                echo "";
            }
        break;

        case 'generarTokenInvitado':
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
             $token = generate_string($permitted_chars, 6);
            
             $rspta =$audiencias->VerificaTokenInvitado($token);
             if ($rspta == "")
             {
                 echo $token;
             }else{
                 echo "";
             }
         break;
 


        
        
       
         

         case 'vertoken':
            $rspta =$audiencias->mostrar_token($numaudiencia,$idaudiencia);
            echo json_encode($rspta);
        break;

        case 'mostrar':
            $rspta =$audiencias->mostrar($idtipaudiencia);
            echo json_encode($rspta);
        break;

        case 'CargaInfoExpedientes':        //CARGAR INFO DE EXPEDIENTE
            $rspta =$audiencias->carga_data_expedientes($expediente);
            echo json_encode($rspta);
            //echo $rspta;
        break;


        case 'CargaNumAudiencia':
            require_once "../modelos/Audiencias.php";
            $exped = new Audiencias();
            $rspta = $exped->ver_num_audiencia($expediente);
            $rws=mysqli_fetch_array($rspta);
            
            $codigo = (empty($rws['last']) ? 1 : $rws['last']+=1);
            echo $codigo;




        break;




        
    

        case 'listar':
            $rspta =$audiencias->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=> 
                        '<button class="btn btn-outline btn-info" onclick="mostrar('.$reg->idtipoaudiencia.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button type="button" class="btn btn-outline btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" onclick="Eliminar('.$reg->idtipoaudiencia.')"><li class="fa fa-trash"></li></button>'
                        
                        ,
                    
                    "1"=>$reg->nombreaudiencia,
                    "2"=>$reg->descripcion
                    
                
                   
                        
                    
                );
            }
            $results = array(
                "sEcho"=>1, //Informacion para el datable
                "iTotalRecords" =>count($data), //enviamos el total de registros al datatable
                "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
                "aaData" =>$data
            );
            echo json_encode($results);

        break;

        case 'mostrarAudiencia':
            $rspta = $audiencias->ver_audiencia($numaudiencia);
            echo json_encode($rspta);
        break;

        case 'DatosAudienciaSesion':
            $rspta = $audiencias->ver_datosAudienciaSesion($idaudiencia);
            echo json_encode($rspta);
        break;


        


        case 'listarAudiencias':
            $rspta =$audiencias->listar_audiencias();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=> 
                        '<button class="btn btn-outline btn-info" onclick="verAudiencia('.$reg->numAudiencia.')"><li class="fa fa-search"></li></button>'
                       
                        
                        ,
                    
                    "1"=>$reg->numAudiencia,
                    "2"=>$reg->expediente,
                    "3"=>$reg->inicio,
                    "4"=>$reg->finaliza,
                    "5"=>$reg->nombreaudiencia,
                    "6"=>$reg->sala,
                    "7"=>$reg->nombreStatus

                    
                    
                );
            }
            $results = array(
                "sEcho"=>1, //Informacion para el datable
                "iTotalRecords" =>count($data), //enviamos el total de registros al datatable
                "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
                "aaData" =>$data
            );
            echo json_encode($results);

        break;


     


     
        




        


        case 'SelectTipoAudiencias':
            require_once "../modelos/Audiencias.php";
            $tipoaudiencias = new Audiencias();

            $rspta = $tipoaudiencias->select_tipo_audiencias();

            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->idtipoaudiencia.'>'
                        .$reg->nombreaudiencia.
                      '</option>';
            }
        break;


        case 'verificarLogin':
            
            $idaudiencia = $_POST['idaudiencia'];
            $token = $_POST['token'];
            $userid = $_POST['userid'];

            

            $rspta = $audiencias->valida_token_sistema($idaudiencia, $token,$userid);
            $fetch = $rspta->fetch_object();


            if(isset($fetch))
            {
               
            }
         


            echo json_encode($fetch); //Retornando JSON
        break;


        


      

    }


  

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

?>