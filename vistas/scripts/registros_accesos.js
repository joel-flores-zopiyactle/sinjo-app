var tabla;

//Funcion que se ejecuta al inicio
function init()
{
  
    listar();
    

  

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
                    
                    url: '../ajax/registro_accesos.php?op=listarAccesos',
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



function mayus(e) {
    e.value = e.value.toUpperCase();
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