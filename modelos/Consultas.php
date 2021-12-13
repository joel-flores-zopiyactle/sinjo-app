<?php
    require '../config/conexion.php';

    Class Consultas 
    {
        public function __construct()
        {

        }

      

        public function listar_calendario()
        {
            $sql = "SELECT id_audiencia,numAudiencia, inicio,finaliza, expediente FROM tbl_audiencias  ";

            return ejecutarConsulta($sql);
        }



        public function registrar_actividad($idusuario,$fecha,$hora,$actividad)
        {
            $sql = "INSERT INTO tbl_actividad (
                      idusuario,fecha,hora,actividad
                    ) 
                    VALUES ('$idusuario','$fecha','$hora','$actividad'
                        )";
            
            return ejecutarConsulta($sql);
           // echo $sql;
           // return ejecutarConsulta($sql);

         

        }

      
    }

?>