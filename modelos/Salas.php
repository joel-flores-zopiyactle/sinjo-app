<?php
    require '../config/conexion.php';

    Class Salas 
    {
        public function __construct()
        {

        }

        public function insertar($sala,$numerosala,$ubicacion,$capacidad)
        {
            $sql = "INSERT INTO salas (
                      sala,numsala,ubicacion,capacidad,status
                    ) 
                    VALUES ('$sala','$numerosala',
                        '$ubicacion',
                        '$capacidad',
                        '1'
                        )";
            
            //return ejecutarConsulta($sql);
            return ejecutarConsulta($sql);

         

        }

        public function editar($idsala,$numerosala,$sala,$ubicacion,$capacidad)
        {
            $sql = "UPDATE salas SET 
                    sala='$sala', 
                    numsala='$numerosala', 
                    ubicacion='$ubicacion',
                    capacidad='$capacidad'
                   
                    WHERE idsala='$idsala'";
            
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

    
        public function mostrar($idsala)
        {
            $sql = "SELECT * FROM salas 
                    WHERE idsala='$idsala'";

            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar()
        {
            $sql = "SELECT * FROM salas";

            return ejecutarConsulta($sql);
        }

        public function select_salas()
        {
            $sql = "SELECT * FROM salas";

            return ejecutarConsulta($sql);
        }


        

        public function Eliminar($idsala)
        {
            $sql = "DELETE from salas Where idsala = $idsala";

            return ejecutarConsulta($sql);
        }


       

      

    }

?>