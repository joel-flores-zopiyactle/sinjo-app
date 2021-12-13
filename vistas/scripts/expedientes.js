var tabla;

//Funcion que se ejecuta al inicio
function init()
{
   // mostrarform(false);
    listar();
    mostrarform(false);
   
    $("#fechareg").datepicker({
    });

    verNumFolio();


   


    
    

    $("#formExpediente").on("submit",function(e) //formulario catalogo audiencias
    {
        guardar(e);
    })

    $.post(
        "../ajax/expedientes.php?op=selectTipoJuicio",
        function(data)
        {        
            //console.log(data);
            $("#tipojuicio").html(data);
        }
    );

    $.post(
        "../ajax/expedientes.php?op=ListaJuez",
        function(data)
        {        
            //console.log(data);
            $("#selectjuez").html(data);
        }
    );

    $.post(
        "../ajax/expedientes.php?op=ListaSecretario",
        function(data)
        {        
            //console.log(data);
            $("#selectsecretario").html(data);
        }
    );


    




}

function verNumFolio()
{
    $.post(
        "../ajax/expedientes.php?op=NumFolio",
        function(data)
        {        
         
           $("#folio").val(data);
        }
    );
}




//funcion limpiar
function limpiar()
{
   

}





//funcion mostrar formulario
function mostrarform(flag)
{
    limpiar();

    if(flag)
    {
        $("#listadoregistros").hide();
        $("#formularioexpediente").show();
    }
    else
    {
        $("#formularioexpediente").hide();
        $("#listadoregistros").show();
    }
}


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
                    
                    url: '../ajax/expedientes.php?op=listarExpedientes',
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
function guardar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formExpediente")[0]);
    
    $.ajax({
        url: "../ajax/expedientes.php?op=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {
            console.log("succes");
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


function cancelarform()
{
    limpiar();
    mostrarform(false);
}


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



//funcion para descativar categorias
function desactivar(idarticulo)
{
    bootbox.confirm("¿Estas seguro de desactivar el Articulo?",function(result){
        if(result)
        {
            $.post(
                "../ajax/articulo.php?op=desactivar",
                {idarticulo:idarticulo},
                function(e)
                {
                    bootbox.alert(e);
                    tabla.ajax.reload();
        
                }
            );
        }
    });
}




init();