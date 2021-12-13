<?php
    
    require_once '../modelos/Centrosjusticia.php';

   $CentrosJ = new CentrosJusticia();
    $id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
    $nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


    switch($_GET["op"])
    {
        case 'guardaryeditar':

           
            if (empty($id)){
                $rspta=$CentrosJ  ->insertar($nombre,$descripcion);
                echo $rspta ? "Rol registrado" : "No se ha podido registrar";
            }
            else {
                $rspta=$CentrosJ  ->editar($id,$nombre,$descripcion);
                echo $rspta ? "Rol actualizado" : "No se puede actualizar";
            }
        break;

      

        case 'eliminar':
            $rspta =$CentrosJ ->Eliminar($id);
            echo $rspta ? "Rol eliminada" : "No se puede eliminar esta sala";
        break;

        case 'mostrar':
            $rspta =$CentrosJ ->mostrar($id);
            echo json_encode($rspta);
        break;
    

        case 'listar':
            $rspta =$CentrosJ ->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=> 
                        '<button class="btn btn-outline btn-info" onclick="mostrar('.$reg->id_centroJusticia.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button type="button" class="btn btn-outline btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" onclick="Eliminar('.$reg->id_centroJusticia.')"><li class="fa fa-trash"></li></button>'
                        
                        ,
                    
                    "1"=>$reg->centrojusticia,
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

        case 'SelectCentroJusticia':
            require_once "../modelos/Centrosjusticia.php";
            $centrosjusticia = new CentrosJusticia();

            $rspta = $centrosjusticia->select_centrosjusticia();

            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->id_centroJusticia.'>'
                        .$reg->centrojusticia.
                      '</option>';
            }
        break;

    }

?>