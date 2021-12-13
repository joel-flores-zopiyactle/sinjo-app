var tabla;

//Funcion que se ejecuta al inicio
function init()
{
    mostrarform(false);
    listar();
    

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })

   
}

//funcion limpiar
function limpiar()
{
    $("#tipaudiencianame").val("");
    $("#descripcion").val("");

}

//funcion mostrar formulario
function mostrarform(flag)
{
    limpiar();

    if(flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Funcion cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//Funcion listar
function  listar()

{
    
    tabla = $('#tblistado')
        .dataTable(
            {
                "aProcessing":true, //Activamos el procesamiento del datatables
                "aServerSide":true, //Paginacion y filtrado realizados por el servidor
                dom: "Bfrtip", //Definimos los elementos del control de tabla
                buttons:[
                    'copyHtml5',
                    'excelHtml5',
                    'pdf',
                    'print',
                ],
                "ajax":{
                    
                    url: '../ajax/audiencias.php?op=listar',
                    type: "get",
                    dataType:"json",
                    error: function(e) {
                        alert(e.responseText);
                        console.log(e.responseText);
                    }
                },
                "bDestroy": true,
                "iDisplayLength": 5, //Paginacion
                "order": [[0,"desc"]] //Ordenar (Columna, orden)
            
            })
        .DataTable();
}

//funcion para guardar o editar
function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
    
    $.ajax({
        url: "../ajax/audiencias.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {
            console.log("succes");
            //alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        },
        error: function(error)
        {
            console.log("error: " + error);
        } 
    });

    limpiar();
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}

function mostrar(idtipaudiencia)
{
    $.post(
        "../ajax/audiencias.php?op=mostrar",
        {idtipaudiencia:idtipaudiencia},
        function(data,status)
        {
            data = JSON.parse(data);

            
            mostrarform(true);

          
            $("#tipaudiencianame").val(data.nombreaudiencia);
            $("#descripcion").val(data.descripcion);
            
          
            $("#idtipaudiencia").val(data.idtipoaudiencia);

            

        }
    );
}

//funcion para descativar categorias


function Eliminar(idtipaudiencia)
{
   
    
       
            $.post(
                "../ajax/audiencias.php?op=eliminar",
                {idtipaudiencia:idtipaudiencia},
                function(e)
                {
                    alert(e);
                    tabla.ajax.reload();
        
                }
            );
        
}







init();