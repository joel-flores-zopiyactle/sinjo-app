<?php
    
    require_once '../modelos/Salas.php';

    $salas = new Salas();
    $idsala=isset($_POST["idsala"])? limpiarCadena($_POST["idsala"]):"";
    $sala=isset($_POST["sala"])? limpiarCadena($_POST["sala"]):"";
    $numerosala=isset($_POST["numerosala"])? limpiarCadena($_POST["numerosala"]):"";

    $ubicacion=isset($_POST["ubicacion"])? limpiarCadena($_POST["ubicacion"]):"";
    $capacidad=isset($_POST["capacidad"])? limpiarCadena($_POST["capacidad"]):"";

    switch($_GET["op"])
    {
        case 'guardaryeditar':

           
            if (empty($idsala)){
                $rspta=$salas->insertar($sala,$numerosala,$ubicacion,$capacidad);
                echo $rspta ? "La sala ha sido registrada" : "No se ha podido registrar";
            }
            else {
                $rspta=$salas->editar($idsala,$numerosala,$sala,$ubicacion,$capacidad);
                echo $rspta ? "Sala actualizada" : "No se puede actualizar";
            }
        break;

        case 'desactivar':
                $rspta = $salas->desactivar($idsala);
                echo $rspta ? "Sala desactivada" : "Articulo no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $salas->activar($idsala);
            echo $rspta ? "Articulo activado" : "Articulo no se pudo activar";
        break;

        case 'eliminar':
            $rspta = $salas->Eliminar($idsala);
            echo $rspta ? "Sala eliminada" : "No se puede eliminar esta sala";
        break;

        case 'mostrar':
            $rspta = $salas->mostrar($idsala);
            echo json_encode($rspta);
        break;
    

        case 'listarSalas':
            $rspta = $salas->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=> 
                        '<button class="btn btn-outline btn-info" onclick="mostrar('.$reg->idsala.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button type="button" class="btn btn-outline btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" onclick="Eliminar('.$reg->idsala.')"><li class="fa fa-trash"></li></button>'
                        
                        ,
                    
                    "1"=>$reg->sala,
                    "2"=>$reg->numsala,
                    "3"=>$reg->ubicacion,
                    "4"=>$reg->capacidad,
                    
                
                   
                        
                    
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

        case 'selectSala':
            require_once "../modelos/Salas.php";
            $salas = new Salas();

            $rspta = $salas->select_salas();

            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->idsala.'>'
                        .$reg->sala.
                      '</option>';
            }
        break;
    }

?>