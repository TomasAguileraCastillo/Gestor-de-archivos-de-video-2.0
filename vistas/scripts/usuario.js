var tabla;
new DataTable('#tbllistado', {responsive: true});
/*********************************************************************************** */
//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
	$("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	})
	$("#imagenmuestra").hide();

}

//Función limpiar
function limpiar()
{
	$("#nomb").val("");
	$("#apell").val("");
	$("#email").val("");
	$("#comen").val("");
	$("#imagenmuestra").attr("src","");
	$("#arch").val("");
	$("#idusuario").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
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



//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}



//Función Listar
function listar() 
{
  tabla = $('#tbllistado').dataTable(
    {
      "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros
      "aProcessing": true, //Activamos el procesamiento del datatables
      "aServerSide": true, //Paginación y filtrado realizados por el servidor
      dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
      buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
              ],
      "ajax":
            {
              url: '../ajax/usuario.php?op=listar',
              type: "get",
              dataType: "json",
              error: function (e) {
                console.log(e.responseText);
              }
            },
    "language": {
        "processing"  :  "Trabajando ...",
        "search"      :         "Buscar&nbsp;:",
        "info"        : 'Mostrando Pagina _PAGE_ of _PAGES_',
        "infoEmpty"   : 'No hay Registros Disponibles',
        "infoFiltered": '(filtered from _MAX_ total records)',
        "lengthMenu"  : 'Mostrar _MENU_ Registros',
        "zeroRecords" : 'No Existen Registros para Mostrar',
        "paginate"    : {
                          "first":      "Primera",
                          "previous":   "Anterior",
                          "next":       "Proxima",
                          "last":       "Ultima"},
        "buttons"     : {
                          "copyTitle": "Tabla Copiada",
                          "copySuccess": {
                                            _: '%d líneas copiadas',
                                            1: '1 línea copiada'}
                        }
                  },
        "bDestroy"    : true,
      "iDisplayLength": 5, //Paginación
      "order"         : [[0, "desc"]], //Ordenar (columna,orden)
      }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/usuario.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idusuario){
	$.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status){
		data = JSON.parse(data);		
		mostrarform(true);   

 		$("#nomb").val(data.nombre_usuario);
		$("#apell").val(data.apellido_usuario);
		$("#email").val(data.email_usuario);
		$("#comen").val(data.comentario_usuario);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen_usuario);
		$("#imagenactual").val(data.imagen);
 		$("#idusuario").val(data.id_usuario);
 		 
 	})
}

//Función para desactivar registros
function desactivar(idusuario)
{
	bootbox.confirm("¿Está Seguro de desactivar al Usuario?", function(result){
		if(result)
		{
        	$.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idusuario)
{
	bootbox.confirm("¿Está Seguro de activar al Usuario?", function(result){
		if(result)
		{
        	$.post("../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
init();