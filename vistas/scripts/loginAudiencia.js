$("#frmAccesoAudiencia").on('submit',function(e){
    e.preventDefault();
    idsistema = $("#idsistema").val();
    token = $("#token").val();
    userid= $("#userid").val();

    $.post("../ajax/audiencias.php?op=verificarLogin",
        {
            idsistema:idsistema,
            token:token,
            userid:userid
        },
        function(data)
        {

            if(data != 'null')
            {
                insertar_acceso(userid,token,idsistema);

                $(location).attr("href","portalAudiencia.php");
                
            }
            else
            {
                swal({
                    title: "Acceso no permitido",
                    text: "No tiene acceso a esta audiencia",
                    type: "error"

                });
            }
           
        }
    );
})


//funcion para descativar categorias
function insertar_acceso(userid,token,idsistema)
{
   
    $.post("../ajax/audiencias.php?op=actualizarAsistencia",
        {
            idsistema:idsistema,
            token:token,
            userid:userid
        },
        function(data)
        {
alert(data);
           
        }
    );
}
