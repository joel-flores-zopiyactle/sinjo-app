<?php



     date_default_timezone_set('America/Mexico_City');
    require_once '../modelos/TipoAudiencias.php';

   $audiencias = new TipoAudiencias();
   
    $idtipaudiencia=isset($_POST["idtipaudiencia"])? limpiarCadena($_POST["idtipaudiencia"]):"";
    $tipaudiencianame=isset($_POST["tipaudiencianame"])? limpiarCadena($_POST["tipaudiencianame"]):"";

    $descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

    switch($_GET["op"])
    {


       


        case 'guardaryeditar':

           
            if (empty($idtipaudiencia)){
                $rspta=$audiencias->insertar($tipaudiencianame,$descripcion);
                echo $rspta ? "Tipo de audiencia ha sido registrada" : "No se ha podido registrar";
            }
            else {
                $rspta=$audiencias->editar($idtipaudiencia,$tipaudiencianame,$descripcion);
                echo $rspta ? "Se actualizo el tipo de audiencia" : "No se puede actualizar";
            }
        break;

        case 'listar':
            $rspta = $audiencias->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=> 
                        '<button class="btn btn-outline btn-info" onclick="mostrar('.$reg->idtipoaudiencia.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button type="button" class="btn btn-outline btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" onclick="Eliminar('.$reg->idtipoaudiencia.')"><li class="fa fa-trash"></li></button>'
                        
                        ,
                    
                    "1"=>$reg->nombreaudiencia,
                    "2"=>$reg->descripcion,
                    
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

      

        case 'eliminar':
            $rspta =$audiencias->Eliminar($idtipaudiencia);
            echo $rspta ? "Tipo de audiencia eliminada" : "No se puede eliminar ";
        break;

       
        case 'mostrar':
            $rspta =$audiencias->mostrar($idtipaudiencia);
            echo json_encode($rspta);
        break;


    }


  



?>