<?php
    require '../config/conexion.php';

    Class CentrosJusticia 
    {
        public function __construct()
        {

        }

        public function insertar($nombre,$descripcion)
        {
            $sql = "INSERT INTO centrosjusticia (
                      centrojusticia,descripcion
                    ) 
                    VALUES ('$nombre','$descripcion'
                        )";
            
            //return ejecutarConsulta($sql);
            return ejecutarConsulta($sql);

         

        }

        public function editar($id,$nombre,$descripcion)
        {
            $sql = "UPDATE centrosjusticia SET 
                    centrojusticia='$nombre', 
                    descripcion='$descripcion'
                   
                    WHERE id_centroJusticia='$id'";
            
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

    
        public function mostrar($id)
        {
            $sql = "SELECT * FROM centrosjusticia 
                    WHERE id_centroJusticia=$id";

            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar()
        {
            $sql = "SELECT * FROM centrosjusticia ";

            return ejecutarConsulta($sql);
        }

        public function select_centrosjusticia()
        {
            $sql = "SELECT * FROM centrosjusticia";

            return ejecutarConsulta($sql);
        }


        public function Eliminar($id)
        {
            $sql = "DELETE from centrosjusticia Where id_centroJusticia = $id";

            return ejecutarConsulta($sql);
        }


       

      

    }

?>