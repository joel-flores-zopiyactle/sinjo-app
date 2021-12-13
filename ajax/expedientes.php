<?php
     date_default_timezone_set('America/Mexico_City');
    require_once '../modelos/Expedientes.php';
    require_once '../modelos/Consultas.php';
    require_once '../modelos/Audiencias.php';

    $consulta = new Consultas();
   $expedientes= new Expedientes();
   $classAudiencias = new Audiencias();


   
   $idexpediente=isset($_POST["idexpediente"])? limpiarCadena($_POST["idexpediente"]):"";

    $fecha=isset($_POST["fechareg"])? limpiarCadena($_POST["fechareg"]):"";
    $juzgado=isset($_POST["juzgado"])? limpiarCadena($_POST["juzgado"]):"";
    $tipojuicio=isset($_POST["tipojuicio"])? limpiarCadena($_POST["tipojuicio"]):"";
   
    $juez=isset($_POST["selectjuez"])? limpiarCadena($_POST["selectjuez"]):"";
    $actor=isset($_POST["actor"])? limpiarCadena($_POST["actor"]):"";
    $demandado=isset($_POST["demandado"])? limpiarCadena($_POST["demandado"]):"";
    $noexpediente=isset($_POST["noexpediente"])? limpiarCadena($_POST["noexpediente"]):"";
    $anoexpediente=isset($_POST["anoexpediente"])? limpiarCadena($_POST["anoexpediente"]):"";
    $secretario=isset($_POST["selectsecretario"])? limpiarCadena($_POST["selectsecretario"]):"";
    
    $expediente = $noexpediente."/".$anoexpediente;
    $hora_actual =date('H:i:s');

    
    $fecha_actual = date('Y/m/d');
    

 
$fechareg = date("Y/m/d", strtotime($fecha));


    switch($_GET["op"])
    {
    
           
            //   `$cons=$consulta->registrar_actividad('1',$fecha_actual,$hora_actual,'NUEVO EXPEDIENTE');
            //   $rspta=$expedientes->guarda_expediente($fechareg,$juzgado,$tipojuicio,$expediente,$juez,$actor,$demandado,$secretario);
            //   $rspta_numaudiencias=$classAudiencias->insertar_nuevo_numaudiencia($expediente);
            //   echo $rspta ? "Expediente registrado" : "NUMERO DE EXPEDIENTE REPETIDO";`
          
       


        case 'guardar':

           
            if (empty($idexpediente)){
                $rspta=$expedientes->guarda_expediente($fechareg,$juzgado,$tipojuicio,$expediente,$juez,$actor,$demandado,$secretario);
                echo $rspta ? "Expediente ha sido registrado" : "No se ha podido registrar";
            }
            else {
                $rspta=$expedientes->editar($idexpediente,$fechareg,$juzgado,$tipojuicio,$expediente,$juez,$actor,$demandado,$secretario);
                echo $rspta ? "Expediente actualizado" : "No se puede actualizar";
            }
        break;


      

        case 'eliminar':
            $rspta =$expedientes->Eliminar($idexpediente);
            echo $rspta ? "Expediente eliminado" : "No se puede eliminar ";
        break;

        
       

        case 'mostrar':
            $rspta =$expedientes->mostrar($idexpediente);
            echo json_encode($rspta);
        break;
       

        
    

        case 'listarExpedientes':
            $rspta =$expedientes->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {

                $fechareg = date("d/m/Y", strtotime($reg->fechaRegistro));
                $data[] = array(
                    "0"=> 
                        '<button class="btn btn-outline btn-info" onclick="mostrar('.$reg->id_expediente.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button type="button" class="btn btn-outline btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" onclick="Eliminar('.$reg->id_expediente.')"><li class="fa fa-trash"></li></button>'
                         ,
                    
                    "1"=>$reg->NumExpediente,
                    "2"=> $fechareg ,
                    "3"=>$reg->TipoJuicio,
                    "4"=>$reg->nombre,                    
                    "5"=>$reg->Actor,
                    "6"=>$reg->Demandado
                        
                    
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



        

        case 'selectTipoJuicio':
            require_once "../modelos/Expedientes.php";
            $exped = new Expedientes();

            $rspta = $exped->select_tipoJuicios();

            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->id_juicio.'>'
                        .$reg->TipoJuicio.
                      '</option>';
            }
        break;


        case 'NumFolio':
            require_once "../modelos/Expedientes.php";
            $exped = new Expedientes();
            $rspta = $exped->ver_num_folio();
            $rws=mysqli_fetch_array($rspta);
            $numero=$rws['last']+1;
            echo $numero;

        break;


        

        case 'ListaJuez':
            require_once "../modelos/Expedientes.php";
            $exped = new Expedientes();

            $rspta = $exped->select_juez();

            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->idusuario.'>'
                        .$reg->nombre.
                      '</option>';
            }
        break;

        case 'ListaSecretario':
            require_once "../modelos/Expedientes.php";
            $exped = new Expedientes();

            $rspta = $exped->select_secretario();

            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->idusuario.'>'
                        .$reg->nombre.
                      '</option>';
            }
        break;


        


        




       


      

        


      

    }

?>