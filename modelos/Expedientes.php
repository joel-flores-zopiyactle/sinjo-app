<?php
    require '../config/conexion.php';

    Class Expedientes 
    {
        public function __construct()
        {

        }

        public function guarda_expediente($fechareg,$juzgado,$tipojuicio,$expediente,$juez,$actor,$demandado,$secretario)
        {
            $sql = "INSERT INTO tbl_expedientes (
                      NumExpediente,fechaRegistro,TipoJuicio,juzgado,Juez,estado,Actor,Demandado,Secretario
                    ) 
                    VALUES ('$expediente','$fechareg','$tipojuicio','$juzgado','$juez','1','$actor','$demandado','$secretario'
                        )";
            
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

        
        
        public function ver_num_folio()
        {
            $sql= "SELECT last_insert_id(id_expediente) as last from tbl_expedientes order by id_expediente desc limit 0,1";
            
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
            $sql = "SELECT tbl_expedientes.id_expediente, usuario.nombre, tbl_expedientes.estado, tbl_tipojuicios.TipoJuicio,tbl_expedientes.NumExpediente,tbl_expedientes.fechaRegistro,tbl_expedientes.juzgado, tbl_expedientes.Actor, 
            tbl_expedientes.Demandado FROM tbl_expedientes
            INNER JOIN tbl_tipojuicios on tbl_tipojuicios.id_juicio = tbl_expedientes.TipoJuicio
            INNER JOIN usuario ON usuario.idusuario = tbl_expedientes.Juez";

            return ejecutarConsulta($sql);
        }

      

        
        public function Eliminar($idtipoaudiencia)
        {
            $sql = "DELETE from tipoaudiencias Where idtipoaudiencia = $idtipoaudiencia";

            return ejecutarConsulta($sql);
        }

        public function select_tipoJuicios()
        {
            $sql = "SELECT * FROM tbl_tipojuicios";

            return ejecutarConsulta($sql);
        }

        public function select_juez()
        {
            $sql = "SELECT * FROM usuario where rol ='7'";

            return ejecutarConsulta($sql);
        }

        public function select_secretario()
        {
            $sql = "SELECT * FROM usuario where rol ='20'";

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

        


        
     




       

      

    }

?>