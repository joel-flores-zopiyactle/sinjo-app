<?php
     date_default_timezone_set('America/Mexico_City');
    require_once '../modelos/Registros.php';

   $registros = new Registros();
  


    switch($_GET["op"])
    {
       
      

        case 'eliminar':
            $rspta =$registros->Eliminar($idtipaudiencia);
            echo $rspta ? "Rol eliminada" : "No se puede eliminar esta sala";
        break;

        
       
        
    

        case 'listarAccesos':
            $rspta =$registros->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                   
                    "0"=>$reg->idusuario,
                    "1"=>$reg->usuario,
                    "2"=>$reg->fecha_acceso,
                    "3"=>$reg->hora_acceso,
                    "4"=>$reg->status
                    
                    
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

        case 'listarEventos':
            $rspta =$registros->listar_eventos();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                   
                    "0"=>$reg->idusuario,
                    "1"=>$reg->fecha,
                    "2"=>$reg->hora,
                    "3"=>$reg->actividad
                    
                    
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

        


       

        


     

        


      

    }

?>