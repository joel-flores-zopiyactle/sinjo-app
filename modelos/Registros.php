<?php
    require '../config/conexion.php';

    Class Registros 
    {
        public function __construct()
        {

        }

      
   

        public function listar()
        {
            $sql = "SELECT * FROM registro_accesos ";

            return ejecutarConsulta($sql);
        }


        public function listar_eventos()
        {
            $sql = "SELECT * FROM tbl_actividad ";

            return ejecutarConsulta($sql);
        }


        

     

        
        public function Eliminar($idtipoaudiencia)
        {
            $sql = "DELETE from tipoaudiencias Where idtipoaudiencia = $idtipoaudiencia";

            return ejecutarConsulta($sql);
        }

        
        


        
     




       

      

    }

?>