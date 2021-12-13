var tabla;

//Funcion que se ejecuta al inicio
function init()
{
    mostrarform(false);
    listar_salas();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })

   
}

//funcion limpiar
function limpiar()
{
    $("#sala").val("");
    $("#numerosala").val("");
    
    $("#ubicacion").val("");
    $("#capacidad").val("");
   

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
function  listar_salas()

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
                    
                    url: '../ajax/salas.php?op=listarSalas',
                    type: "get",
                    dataType:"json",
                    error: function(e) {
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
        url: "../ajax/salas.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {
            //console.log("succes");
            alert(datos);
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

function mostrar(idsala)
{
    $.post(
        "../ajax/salas.php?op=mostrar",
        {idsala:idsala},
        function(data,status)
        {
            data = JSON.parse(data);
            mostrarform(true);

            
            $("#sala").val(data.sala);
            $("#numerosala").val(data.numsala);
            
            $("#ubicacion").val(data.ubicacion);
            $("#capacidad").val(data.capacidad);
        
            $("#idsala").val(data.idsala);

            

        }
    );
}

//funcion para descativar categorias
function desactivar(idsala)
{

      
            $.post(
                "../ajax/salas.php?op=desactivar",
                {idsala:idsala},
                function(e)
                {
alert(e);
                    tabla.ajax.reload();
        
                }
            );

}

function activar(idsala)
{
   
    
       
            $.post(
                "../ajax/salas.php?op=activar",
                {idsala:idsala},
                function(e)
                {
                    alert(e);
                    tabla.ajax.reload();
        
                }
            );
        
}

function Eliminar(idsala)
{
   
    
       
            $.post(
                "../ajax/salas.php?op=eliminar",
                {idsala:idsala},
                function(e)
                {
                    alert(e);
                    tabla.ajax.reload();
        
                }
            );
        
}






function generarbarcode()
{
    var codigo = $("#codigo").val();
    JsBarcode("#barcode",codigo);
    $("#print").show();
}

function imprimir()
{
    $("#print").printArea();
}

init();