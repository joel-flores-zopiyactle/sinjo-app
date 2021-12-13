<?php
    
    require_once '../modelos/Roles.php';

    $roles = new Roles();
    $idrol=isset($_POST["idrol"])? limpiarCadena($_POST["idrol"]):"";
    $rol=isset($_POST["rolname"])? limpiarCadena($_POST["rolname"]):"";
    $descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


    switch($_GET["op"])
    {
        case 'guardaryeditar':

           
            if (empty($idrol)){
                $rspta=$roles->insertar($rol,$descripcion);
                echo $rspta ? "Rol registrado" : "No se ha podido registrar";
            }
            else {
                $rspta=$roles->editar($idrol,$rol,$descripcion);
                echo $rspta ? "Rol actualizado" : "No se puede actualizar";
            }
        break;

      

        case 'eliminar':
            $rspta = $roles->Eliminar($idrol);
            echo $rspta ? "Rol eliminada" : "No se puede eliminar esta sala";
        break;

        case 'mostrar':
            $rspta = $roles->mostrar($idrol);
            echo json_encode($rspta);
        break;
    

        case 'listar':
            $rspta = $roles->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=> 
                        '<button class="btn btn-outline btn-info" onclick="mostrar('.$reg->idrol.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button type="button" class="btn btn-outline btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top" onclick="Eliminar('.$reg->idrol.')"><li class="fa fa-trash"></li></button>'
                        
                        ,
                    
                    "1"=>$reg->rol,
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

     

        case 'selectRol':
            require_once "../modelos/Roles.php";
            $roles = new Roles();

            $rspta = $roles->select_roles();

           
            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->idrol.'>'
                        .$reg->rol.
                      '</option>';
            }
        break;


        
    }

?>