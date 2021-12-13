<?php
    require '../config/conexion.php';

    Class Roles 
    {
        public function __construct()
        {

        }

        public function insertar($rol,$descripcion)
        {
            $sql = "INSERT INTO roles (
                      rol,descripcion
                    ) 
                    VALUES ('$rol','$descripcion'
                        )";
            
            //return ejecutarConsulta($sql);
            return ejecutarConsulta($sql);

         

        }

        public function editar($idrol,$rol,$descripcion)
        {
            $sql = "UPDATE roles SET 
                    rol='$rol', 
                    descripcion='$descripcion'
                   
                    WHERE idrol='$idrol'";
            
            return ejecutarConsulta($sql);

           
        }

        public function desactivar($idsala)
        {
            $sql= "UPDATE salas SET status='0' 
                   WHERE idsala='$idsala'";
            
            return ejecutarConsulta($sql);
        }

        public function activar($idsala)
        {
            $sql= "UPDATE salas SET status='1' 
            WHERE idsala='$idsala'";
            
            return ejecutarConsulta($sql);
        }

    
        public function mostrar($idrol)
        {
            $sql = "SELECT * FROM roles 
                    WHERE idrol=$idrol";

            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar()
        {
            $sql = "SELECT * FROM roles";

            return ejecutarConsulta($sql);
        }

        public function Eliminar($idrol)
        {
            $sql = "DELETE from roles Where idrol = $idrol";

            return ejecutarConsulta($sql);
        }


        public function select_roles()
        {
            $sql = "SELECT * FROM roles";

            return ejecutarConsulta($sql);
        }

       

      

    }

?>