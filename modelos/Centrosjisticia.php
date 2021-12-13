<?php
    require '../config/conexion.php';

    Class CentrosJusticia 
    {
        public function __construct()
        {

        }

        public function insertar($nameaudiencia,$descripcion)
        {
            $sql = "INSERT INTO centrosjusticia (
                      nombreaudiencia,descripcion
                    ) 
                    VALUES ('$nameaudiencia','$descripcion'
                        )";
            
            //return ejecutarConsulta($sql);
            return ejecutarConsulta($sql);

         

        }

        public function editar($idtipaudiencia,$nameaudiencia,$descripcion)
        {
            $sql = "UPDATE centrosjusticia SET 
                    nombreaudiencia='$nameaudiencia', 
                    descripcion='$descripcion'
                   
                    WHERE idtipoaudiencia='$idtipaudiencia'";
            
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

    
        public function mostrar($idtipaudiencia)
        {
            $sql = "SELECT * FROM centrosjusticia 
                    WHERE idtipoaudiencia=$idtipaudiencia";

            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar()
        {
            $sql = "SELECT * FROM centrosjusticia ";

            return ejecutarConsulta($sql);
        }

        public function Eliminar($idtipoaudiencia)
        {
            $sql = "DELETE from centrosjusticia Where idtipoaudiencia = $idtipoaudiencia";

            return ejecutarConsulta($sql);
        }


       

      

    }

?>