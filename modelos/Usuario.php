<?php
    require '../config/conexion.php';

    Class Usuario 
    {
        public function __construct()
        {

        }

        

        public function insertar($nombre,$telefono,$email,$rol,$login,$clavehash,$imagen)
        {
            $sql = "INSERT INTO usuario (
                        nombre,
                        telefono,
                        email,
                        rol,
                        login,
                        p4ss,
                        status,
                        imagen
                    ) 
                    VALUES (
                        '$nombre',
                        '$telefono',
                        '$email',
                        '$rol',
                        '$login',
                        '$clavehash',
                        '1',                        
                        '$imagen'

                        )";
            
            //return ejecutarConsulta($sql);
            $idusuarionew = ejecutarConsulta_retornarID($sql);

            $num_elementos = 0;
            $sw = true;

            while($num_elementos < count($permisos))
            {
                $sql_detalle ="INSERT INTO usuario_permiso (
                                    idusuario,
                                    idpermiso
                                )
                                VALUES (
                                    '$idusuarionew',
                                    '$permisos[$num_elementos]'
                                )";

                ejecutarConsulta($sql_detalle) or $sw = false;

                $num_elementos = $num_elementos + 1;
            }

            return $sw;
        }


        public function editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
        {
            $sql = "UPDATE usuario SET 
                    nombre='$nombre', 
                    tipo_documento='$tipo_documento',
                    num_documento='$num_documento',
                    direccion='$direccion',
                    telefono='$telefono',
                    email='$email',
                    cargo='$cargo',
                    login='$login',
                    clave='$clave',
                    imagen='$imagen'
                    WHERE idusuario='$idusuario'";
            
            ejecutarConsulta($sql);

            //Eliminamos todos los permisos asignados para volverlos a registrar
            $sqldel = "DELETE FROM usuario_permiso
                        WHERE idusuario='$idusuario'";
            
            ejecutarConsulta($sqldel);

            $num_elementos = 0;
            $sw = true;

            while($num_elementos < count($permisos))
            {
                $sql_detalle = "INSERT INTO usuario_permiso(
                    idusuario,
                    idpermiso
                    )
                    VALUES (
                        '$idusuario',
                        '$permisos[$num_elementos]'
                    )";
                    ejecutarConsulta($sql_detalle) or $sw = false;
                    $num_elementos = $num_elementos + 1;
            }

            return $sw;
        }

        public function desactivar($idusuario)
        {
            $sql= "UPDATE usuario SET condicion='0' 
                   WHERE idusuario='$idusuario'";
            
            return ejecutarConsulta($sql);
        }

        public function activar($idusuario)
        {
            $sql= "UPDATE usuario SET condicion='1' 
                   WHERE idusuario='$idusuario'";
            
            return ejecutarConsulta($sql);
        }

    
        public function mostrar($idusuario)
        {
            $sql = "SELECT * FROM usuario 
                    WHERE idusuario='$idusuario'";

            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar()
        {
            $sql = "SELECT * FROM usuario";

            return ejecutarConsulta($sql);
        }

        public function listarmarcados($idusuario)
        {
            $sql = "SELECT * FROM usuario_permiso
                    WHERE idusuario='$idusuario'";
            
            return ejecutarConsulta($sql);
        }

        //Verficacion de acceso
        public function verificar($Us3r,$password)
        {
            $sql = "SELECT 
                       idusuario,
                       nombre,
                       email,
                       telefono,
                       imagen,
                       login,
                       p4ss,
                       status
                    FROM usuario
                    WHERE login='$Us3r' 
                    AND p4ss='$password'
                    AND status='1'";
            
            return ejecutarConsulta($sql);
        }

        public function select_usuarios()
        {
            $sql = "SELECT * FROM usuario";

            return ejecutarConsulta($sql);
        }

        public function guarda_registro($idusuario,$usuario,$status)
        {
            $hora_hoy = date("H:i:s");
            $hoy = date("d/m/Y"); 
            $sql ="INSERT INTO registro_accesos (
               idusuario, usuario,status,hora_acceso,fecha_acceso
            )
            VALUES (
                '$idusuario','$usuario','$status','$hora_hoy','$hoy'
            )";

                return ejecutarConsulta($sql);
        }

        public function guarda_registro_fallido($usuario,$status)
        {
            $hora_hoy = date("H:i:s");
            $hoy = date("d/m/Y"); 
            $sql ="INSERT INTO registro_accesos (
                usuario,status,hora_acceso,fecha_acceso
            )
            VALUES (
                '$usuario','$status','$hora_hoy','$hoy'
            )";

                return ejecutarConsulta($sql);
        }



        

        

        

    }

?>