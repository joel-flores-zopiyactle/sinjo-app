$("#frmAcceso").on('submit',function(e){
    e.preventDefault();
    Us3r = $("#us3r").val();
    p4ss = $("#password").val();

    $.post("../ajax/usuario.php?op=verificar",
        {
            Us3r:Us3r,
            p4ss:p4ss
        },
        function(data)
        {
            if(data != 'null')
            {
               
                $(location).attr("href","dashboard.php");
            }
            else
            {
               
                    swal({
                        title: "Error",
                        text: "El usuario o contraseña no son correctos",
                        type: "error"

                    });
             
            }
        }
    );
})