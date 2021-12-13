var tabla;

//Funcion que se ejecuta al inicio
function init()
{
   
    listar();
}

//funcion limpiar

//Funcion listar
function listar()
{
    $.ajax({
        url: '../ajax/reservaciones.php?op=listarhorarios',
        type:  'get',
        beforeSend: function () {
                $("#tbcomentarios").html("Procesando, espere por favor...");
        },
        success:  function (response) {
                $("#horarios").html(response);
        }
    });
}






init();