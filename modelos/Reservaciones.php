<?php
    require '../config/conexion.php';

    Class Reservaciones 
    {
        public function __construct()
        {

        }

        public function numAudiencia() //OBTENEMOS EL NUMERO DE AUDIENCIA
        {
            $sql = "SELECT idAudiencia as last
            FROM control_audiencias
            ORDER BY id DESC
            LIMIT 1";

            return ejecutarConsultaSimpleFila($sql);
        }

        

        public function insertar_reserva($numaudiencia,$idsistema,$fcelebracion,$hinicio,$hfinal,$numunica,$centroJusticia,$sala,$tipoAudiencia,$inicio_normal,$final_normal,$token,$token_invitado)
        {
            $sql = "INSERT INTO reservacion_salas (id_audiencia,identificador,id_centroJusticia,idsala,tipoAudiencia,numcausa,fecha_reserva,hora_inicio,hora_final,inicio_normal,final_normal,token,token_invitado)
                    VALUES ('$numaudiencia','$idsistema','$centroJusticia','$sala','$tipoAudiencia','$numunica','$fcelebracion','$hinicio','$hfinal','$inicio_normal','$final_normal','$token','$token_invitado')";
            return ejecutarConsulta($sql);

        }

        public function cambia_control_audiencia($numaudiencia) // cambia tabla control de audiencias para el idconsecutido de audiencias
        {
            $sql_controlAudiencia ="INSERT INTO control_audiencias (idAudiencia) VALUES ('$numaudiencia')";
            return ejecutarConsulta($sql_controlAudiencia);
        }

        
        

        public function validar_disponibilidad($sala,$fcelebracion,$hinicio,$hfinal) // cambia tabla control de audiencias para el idconsecutido de audiencias
        {
            $sql_valida_disponibilidad ="SELECT * from reservacion_salas Where idsala = '$sala' and fecha_reserva ='$fcelebracion' 
                                         and hora_inicio BETWEEN '$hinicio' AND '$hfinal'  ";
           
           return ejecutarConsulta($sql_valida_disponibilidad);
        }
        
        public function carga_participantes($numaudiencia,$nombre,$rol,$descripcion,$idsistema,$numunica,$token) // cambia tabla control de audiencias para el idconsecutido de audiencias
        {
            $sql_controlAudiencia ="INSERT INTO participantes (id_audiencia,nombre,rol,descripcion,numcausa,idsistema,token) VALUES ('$numaudiencia','$nombre','$rol','$descripcion','$numunica','$idsistema','$token')";
            return ejecutarConsulta($sql_controlAudiencia);
        }

        public function  mostrar_confirmacion($id)
        {
            $sql = "SELECT * FROM reservacion_salas 
                    WHERE id_audiencia='$id'";

            return ejecutarConsultaSimpleFila($sql);
        }


       


        
       

      

    }

?>