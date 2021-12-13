var tabla;

//Funcion que se ejecuta al inicio
function init()
{
    mostrarform(false);
    listar();
    GeneraToken();

    var mem = $('#fcelebracion').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        format:'yyyy-mm-dd',
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    $('.clockpicker').clockpicker();
    $('.clockpicker2').clockpicker();


    $("#formInfoAudiencia").on("submit",function(e) //formulario catalogo audiencias
    {
        guardaryeditar(e);
    })

    $.post(
        "../ajax/salas.php?op=selectSala",
        function(data)
        {        
            //console.log(data);
            $("#sala").html(data);
        }
    );

    //Cargamos los items al select centros de justicia
    $.post(
        "../ajax/centrosjusticia.php?op=SelectCentroJusticia",
        function(data)
        {        
            //console.log(data);
            $("#centroJusticia").html(data);
        }
    );

    $.post(
        "../ajax/audiencias.php?op=SelectTipoAudiencias",
        function(data)
        {        
            //console.log(data);
            $("#tipoAudiencia").html(data);
        }
    );


    $.post(
        "../ajax/roles.php?op=selectRol",
        function(data)
        {        
            //console.log(data);
            $("#idrol").html(data);
        }
    );




}

//funcion limpiar
function limpiar()
{
    $("#tipaudiencianame").val("");
    $("#descripcion").val("");

}




function BuscaNumAudiencia(expediente)
{
    
   
    $.post(
        "../ajax/audiencias.php?op=CargaNumAudiencia",
        {expediente:expediente},
      
     
        function(data,status)
        {
            $("#numaudiencia").val(data);
            

        }
    );
}


function cargaDatosExpediente(expediente)
{
    
   
    $.post(
        "../ajax/audiencias.php?op=CargaInfoExpedientes",
        {expediente:expediente},
      
     
        function(data,status)
        {
            data = JSON.parse(data);


            $("#juez").val(data.nombre);
            $("#juzgado").val(data.juzgado);
            $("#actor").val(data.Actor);
            $("#demandado").val(data.Demandado);
            

        }
    );
}



//funcion mostrar formulario
function mostrarform(flag)
{
    limpiar();

    if(flag)
    {
        $("#listadoregistros").hide();
        $("#formularioaudiencias").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnprogramar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioaudiencias").hide();
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
                    
                    url: '../ajax/audiencias.php?op=listarAudiencias',
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
    var formData = new FormData($("#formInfoAudiencia")[0]);
    
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

function detallesAudiencia(id_reservacion_sala)
{
    $.post(
        "../ajax/audiencias.php?op=mostrarDetallesAudiencia",
        {id_reservacion_sala:id_reservacion_sala},
        function(data,status)
        {
            data = JSON.parse(data);

            
            mostrarform(true);

         
             $("#status").html(data.nombreStatus);
             $("#hinicio").html(data.hora_inicio);
             $("#hfinal").html(data.hora_final);
             $("#fecha").html(data.fecha_reserva);
             $("#sala").html(data.sala);
             $("#nocausa").html(data.numcausa);
             $("#idaudiencia").html(data.id_audiencia);
             $("#centrojusticia").html(data.centrojusticia);
             $("#tipoaudiencia").html(data.nombreaudiencia);
             
            // $("#descripcion").val(data.descripcion);
            
          
            // $("#idtipaudiencia").val(data.idtipoaudiencia);

            

        }
    );
}

function GeneraToken()
{
   
    
       
            $.post(
                "../ajax/audiencias.php?op=generarToken",
                function(data)
                {
                    if (data==" ")
                    {
                        GeneraToken();
                    }else{
                        $("#token").val(data);
                    }
        
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


 //////////////////////////////////////// FIN GUARDAR///////////////////////////////////////////////////////

         //select rol

   ////////////////////////////////////////SELECT ROL PARTICIPANTES///////////////////////////////////////////////////////////

   function selectRoles(count)
        {
            $.ajax({
                url: '../ajax/roles.php?op=selectRol',
              
              
                success:  function (data) {
                   
                    $("#idrol"+count).html(data);
                }
            });
        }


   var count = $(".itemRow").length;
   
   $(document).on('click', '#addRows', function() { 
       count++;
       var htmlRows = '';
       htmlRows += '<tr>';
       htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
       htmlRows += '<td><input type="text" name="nombre[]" id="nombre'+count+'" class="form-control quantity" autocomplete="off"></td>';          
       htmlRows += '<td><select name="idrol[]"  id="idrol'+count+'" data-live-search="true" class="form-control selectpicker" required></select></td>';	
       htmlRows += '<td><input type="text" name="descripcion[]" id="descripcion'+count+'" class="form-control quantity" autocomplete="off"></td>';        
       htmlRows += '</tr>';
       $('#invoiceItem').append(htmlRows);
       selectRoles(count);
       selectUsuarios(count);

      
       
   }); 



   $(document).on('click', '#removeRows', function(){
       $(".itemRow:checked").each(function() {
           $(this).closest('tr').remove();
       });
       $('#checkAll').prop('checked', false);
   });	

    //////////////////////////////////////// FIN SELECT ROL PARTICIPANTES///////////////////////////////////////////////////////////




init();