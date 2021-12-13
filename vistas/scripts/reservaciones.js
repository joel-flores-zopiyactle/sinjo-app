var tabla;

//Funcion que se ejecuta al inicio
function init()
{
    mostrar(false);
    //date y time picker


    $('#fcelebracion').datepicker();
    $('#hinicio').timepicker();
    $('#hfinal').timepicker();

    obtenerNumAudiencia(); //obtenemos el num de audiencia a crear

    //guardamos los datos de reservacion

    $("#formInfoAudiencia").on("submit",function(e)
    {
        guardaReservacion(e);
    })

    function mostrar(flag)
        {
            

            if(flag)
            {
                $("#confirmacion").show();
                $("#hoja_reservacion").hide();
                $("#botonesConfirmacion").show();
                
                
            }
            else
            {
                $("#confirmacion").hide();
                $("#hoja_reservacion").show();
                $("#botonesConfirmacion").hide();
            }
        }




    //Cargamos los items al select Sala
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
         //select rol
    $.post(
        "../ajax/roles.php?op=selectRol",
        function(data)
        {        
            //console.log(data);
            $("#idrol").html(data);
        }
    );

    $.post(
        "../ajax/usuario.php?op=selectUsuarios",
        function(data)
        {                    
            $("#userid").html(data);
        }
    );

    

    function selectUsuarios(count)
        {
            $.ajax({
                url: '../ajax/usuario.php?op=selectUsuarios',
                success:  function (data) {
               
                    $("#userid"+count).html(data);
                }
            });
        }

    function selectRoles(count)
        {
            $.ajax({
                url: '../ajax/roles.php?op=selectRol',
              
              
                success:  function (data) {
                   
                    $("#idrol"+count).html(data);
                }
            });
        }

    function obtenerNumAudiencia()  //obtener el numero actual
    {
        $.post(
            "../ajax/reservaciones.php?op=numAudiencia",
            
            function(data,status)
            {
                data = JSON.parse(data);          
                val1 = parseInt(data.last);
                val2 = 1;
                total = val1+val2;
                $("#numaudiencia").val(total);
                
                
                
            }
        );
    
    }

    function ver_confirmacion(id)
{
    $.post(
        "../ajax/reservaciones.php?op=mostrarConfirmacion",
        {id:id},
        function(data,status)
        {
            data = JSON.parse(data);
            mostrar(true);

            $("#identificadorsistema").html(data.id_audiencia);
            


            

        }
    );
}


    ////////////////////////////////////////GUARDAR///////////////////////////////////////////////////////////
    //funcion para guardar o editar
function guardaReservacion(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formInfoAudiencia")[0]);
    
    $.ajax({
        url: "../ajax/reservaciones.php?op=guardaReservacionAudiencia",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {
           if (datos == 'error')
           {
                swal({
                    title: "Horas no disponible",
                    text: "Esta hora no se encuentra disponible",
                    type: "error"

                });         

           }else{
            mostrar(true);
               ver_confirmacion(datos);
               
           }

          

        },
        error: function(error)
        {
            console.log("error: " + error);
        } 
    });

}

    //////////////////////////////////////// FIN GUARDAR///////////////////////////////////////////////////////

         //select rol

   ////////////////////////////////////////SELECT ROL PARTICIPANTES///////////////////////////////////////////////////////////
    var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
        htmlRows += '<td><select name="userid[]"  id="userid'+count+'" data-live-search="true" class="form-control selectpicker" required></select></td>';         
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

    

      

        

  

   
}









init();