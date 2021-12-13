<?php
    require '../config/conexion.php';

    Class Audiencias 
    {
        public function __construct()
        {

        }

       
        public function insertar($numaudiencia,$centroJusticia,$sala,$tipoAudiencia,$inicio,$fin,$expediente,$idsistema)
        {
            $sql = "INSERT INTO tbl_audiencias (
                      numAudiencia,id_centrojusticia,id_sala,id_tipoaudiencia,inicio,finaliza,status,expediente,IDAudiencia
                    ) 
                    VALUES ('$numaudiencia','$centroJusticia','$sala','$tipoAudiencia','$inicio','$fin','1','$expediente','$idsistema'
                        )";
            
            return ejecutarConsulta($sql);
           
         

        }

       
                //**********INSERTA ID CUANDO SE CREA UN EXPEDIENTE **********************/
        public function   insertar_nuevo_numaudiencia($expediente)
        {
            $sql = "INSERT INTO tbl_numaudiencias (
                      NumAudiencia,Expediente) 
                    VALUES ('100','$expediente')";
            
            return ejecutarConsulta($sql);

        }

        public function VerificaToken($token)
        {
            $sql = "select * from tbl_tokens where token = '$token'";
            return ejecutarConsultaSimpleFila($sql);

        }

        public function   insertarNumAudiencia($numaudiencia,$expediente)
        {
            $sql = "INSERT INTO tbl_numaudiencias (
                      NumAudiencia,Expediente) 
                    VALUES ('$numaudiencia','$expediente')";
            
            return ejecutarConsulta($sql);
           
         

        }


        public function editar($idtipaudiencia,$nameaudiencia,$descripcion)
        {
            $sql = "UPDATE tipoaudiencias SET 
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
            $sql = "SELECT * FROM tipoaudiencias 
                    WHERE idtipoaudiencia=$idtipaudiencia";

            return ejecutarConsultaSimpleFila($sql);
        }

        public function mostrarDetallesAudiencias($id_reservacion_sala)
        {
            $sql = "SELECT status_audiencias.nombreStatus, reservacion_salas.status,reservacion_salas.id_reservacion_sala, reservacion_salas.hora_inicio,tipoaudiencias.nombreaudiencia,reservacion_salas.hora_final,reservacion_salas.id_audiencia,centrosjusticia.centrojusticia, reservacion_salas.numcausa, reservacion_salas.fecha_reserva, salas.sala 
            FROM reservacion_salas  
            inner join salas on reservacion_salas.idsala = salas.idsala inner join centrosjusticia on reservacion_salas.id_centroJusticia = centrosjusticia.id_centroJusticia 
            INNER JOIN tipoaudiencias ON reservacion_salas.tipoAudiencia = tipoaudiencias.idtipoaudiencia 
            INNER JOIN status_audiencias on reservacion_salas.status = status_audiencias.id_statusaudiencia
            WHERE reservacion_salas.id_reservacion_sala = $id_reservacion_sala";

            return ejecutarConsultaSimpleFila($sql);
        }

        

        public function listar()
        {
            $sql = "SELECT * FROM tipoaudiencias ";

            return ejecutarConsulta($sql);
        }

        public function listar_audiencias()
        {
            $sql = "SELECT 
            tbl_audiencias.id_audiencia,	tbl_audiencias.expediente, tbl_audiencias.inicio, tbl_audiencias.finaliza, tbl_audiencias.numAudiencia,
               salas.sala, tipoaudiencias.nombreaudiencia, status_audiencias.nombreStatus
                       
                   FROM tbl_audiencias 
                   INNER JOIN salas ON salas.idsala = tbl_audiencias.id_sala
                   INNER JOIN status_audiencias ON status_audiencias.id_statusaudiencia = tbl_audiencias.`status`
                   INNER JOIN tipoaudiencias ON  tipoaudiencias.idtipoaudiencia = tbl_audiencias.id_TipoAudiencia 
               
            ";

            return ejecutarConsulta($sql);
        }



        public function ver_num_audiencia($expediente)
        {
            $sql= "SELECT last_insert_id(NumAudiencia) as last from tbl_numaudiencias where Expediente = '$expediente' order by idNumAudiencia desc limit 0,1";
            
            return ejecutarConsulta($sql);
        }



        public function carga_data_expedientes($expediente)
        {
            $sql= "SELECT tbl_expedientes.id_expediente, tbl_expedientes.folio,usuario.nombre, tbl_expedientes.NumExpediente, tbl_expedientes.juzgado, tbl_expedientes.Actor,tbl_expedientes.Demandado
            FROM tbl_expedientes
            INNER JOIN usuario on usuario.idusuario = tbl_expedientes.Juez WHERE tbl_expedientes.NumExpediente = '$expediente' ";
           
            return ejecutarConsultaSimpleFila($sql);
            //echo $sql;
        }


     
    

        
        public function Eliminar($idtipoaudiencia)
        {
            $sql = "DELETE from tipoaudiencias Where idtipoaudiencia = $idtipoaudiencia";

            return ejecutarConsulta($sql);
        }

        public function select_tipo_audiencias()
        {
            $sql = "SELECT * FROM tipoaudiencias";

            return ejecutarConsulta($sql);
        }

        

        public function verificar_token($idsistema, $token,$userid)
        {
            $sql = "SELECT 
                        idsistema,nombre,rol,token,numcausa
                    FROM participantes
                    WHERE token='$token' 
                    AND idsistema='$idsistema'
                    AND nombre='$userid'";
            
            return ejecutarConsulta($sql);
        }



        public function actualizar_asistencia($userid,$token,$idsistema,$hora)
        {
            $sql = "UPDATE participantes set status ='1' , HoraIngreso = '$hora'
                    WHERE idsistema = '$idsistema' and token = '$token' and nombre ='$userid'";
             return ejecutarConsulta($sql);
        }


        public function guarda_participantes($nombre,$idrol,$descripcion,$expediente,$numaudiencia) // cambia tabla control de audiencias para el idconsecutido de audiencias
        {
            $sql_controlAudiencia ="INSERT INTO tbl_participantes (idAudiencia,Nombre,Comentarios,Rol,NumExpediente) VALUES 
                            ('$numaudiencia','$nombre','$descripcion','$idrol','$expediente')";
            return ejecutarConsulta($sql_controlAudiencia);
        }

        


        
     




       

      

    }

?>