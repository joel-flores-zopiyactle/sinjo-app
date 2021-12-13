<?php

    session_start();
    
    require_once '../modelos/Usuario.php';

    $usuario = new Usuario();

    $idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
    $nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
    $email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
    $rol=isset($_POST["idrol"])? limpiarCadena($_POST["idrol"]):"";
    $login=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
    $clave=isset($_POST["password"])? limpiarCadena($_POST["password"]):"";
    
    $imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

    

    switch($_GET["op"])
    {
        case 'guardaryeditar':

            if(!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
            {
                $imagen = $_POST["imagenactual"];
            }
            else
            {
                $ext = explode(".",$_FILES["imagen"]["name"]);
                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
                {
                    $imagen = round(microtime(true)).'.'.end($ext);
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/usuarios/" . $imagen);
                }
            }


            //Hash SHA256 en la contraseña
            $clavehash = hash("SHA256",$clave);

            if (empty($idusuario)){
                $rspta=$usuario->insertar($nombre,$telefono,$email,$rol,$login,$clavehash,$imagen);
                echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
            }
            else {
                $rspta=$usuario->editar($idusuario,$nombre,$telefono,$email,$rol,$login,$imagen);
                echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
            }
        break;

        case 'desactivar':
                $rspta = $usuario->desactivar($idusuario);
                echo $rspta ? "Usuario eliminado" : "Usuario no se pudo Eliminar";
        break;
        

        case 'activar':
            $rspta = $usuario->activar($idusuario);
            echo $rspta ? "Usuario activado" : "Usuario no se pudo activar";
        break;

        case 'mostrar':
            $rspta = $usuario->mostrar($idusuario);
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta = $usuario->listar();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=> ($reg->status) ? 
                        '<button class="btn btn-info " onclick="mostrar('.$reg->idusuario.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button  class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><li class="fa fa-close"></li></button>'
                        :
                        '<button class="bt btn-info" onclick="mostrar('.$reg->idusuario.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-danger " onclick="desactivar('.$reg->idusuario.')"><li class="fa fa-close"></li></button>'
                        ,
                    "1"=>$reg->nombre,
                    "2"=>$reg->rol,
                    "3"=>$reg->email,
                    "4"=>($reg->status) ?
                         '<span class="btn btn-success btn-rounded">Activado</span>'
                         :      
                         '<span class="btn btn-default btn-rounded">Desactivado</span>'
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

        case 'permisos':
            //obtenemos los permisos de la tabla permisos
            require_once '../modelos/Permiso.php';
            $permiso = new Permiso();
            $rspta = $permiso->listar();

            //Obtener los permisos del usuario
            $id=$_GET['id'];
            $marcados = $usuario->listarmarcados($id);
            
            //declaramos el array para almacenar todos los permisos marcados
            $valores = array();

            //Almacenar los permisos asignados al usuario en el array
            while ($per = $marcados->fetch_object()) 
            {
                array_push($valores,$per->idpermiso);
            }

            while($reg = $rspta->fetch_object())
            {
                $sw = in_array($reg->idpermiso, $valores) ? 'checked' : '';

                echo '<li> 
                        <input type="checkbox" '.$sw.' name="permiso[]" value="'.$reg->idpermiso.'">'
                        .$reg->nombre.
                    '</li>';
            }
        break;


        case 'verificar':
            $Us3r = $_POST['Us3r']; 
            $p4ss = $_POST['p4ss'];

            //Desencriptar clave SHA256
            $clavehash = hash("SHA256",$p4ss);

            $rspta = $usuario->verificar($Us3r, $clavehash);

            $fetch = $rspta->fetch_object();

            if(isset($fetch))
            {
                //Declarando variables de session
                $_SESSION['idusuario'] = $fetch->idusuario;
                $_SESSION['nombre'] = $fetch->nombre;
                $_SESSION['imagen'] = $fetch->imagen;
                $_SESSION['login'] = $fetch->login;
                // //Obtenemos los permisos del usuario
                
                $permisos = $usuario->listarmarcados($fetch->idusuario);

                // $rspta=$usuario->guarda_registro($_SESSION['idusuario'] ,$Us3r,'Acceso correcto');
                 

                // //Array para almacenar los permisos
                 $valores= array();

                 while($per = $permisos->fetch_object())
                 {
                    array_push($valores, $per->idpermiso);
                }

                // //Determinando los accesos del usuario
                in_array(1,$valores) ? $_SESSION['Audiencias'] = 1 : $_SESSION['Audiencias'] = 0;
                in_array(2,$valores) ? $_SESSION['Administracion'] = 1 : $_SESSION['Administracion'] = 0;
            }else{
                $rspta=$usuario->guarda_registro_fallido($Us3r,'Acceso denegado');
            }

            echo json_encode($fetch); //Retornando JSON
        break;

        

        case 'selectUsuarios':
            require_once "../modelos/Usuario.php";
            $usuario = new Usuario();

            $rspta = $usuario->select_usuarios();
           
            while($reg = $rspta->fetch_object())
            {
                echo '<option value='.$reg->idusuario.'>'
                        .$reg->nombre.
                      '</option>';
            }
        break;


      
        
        

        case 'salir':
            session_unset(); //Limpiamos las variables de sesion
            session_destroy(); //Destriumos la sesion
            header("Location: ../index.php");
        break;

    }

?>