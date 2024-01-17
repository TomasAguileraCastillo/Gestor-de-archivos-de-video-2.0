var tabla;
new DataTable('#tbllistado', {responsive: true});
/*********************************************************************************** */
//Función que se ejecuta al inicio
function init(){
  mostrarform(false);
  listar();
  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  })

  //  $("#imagenmuestra").hide();

  $.post("../ajax/video.php?op=seleccionCurso", function(r){
    $("#idcurso").html(r);
    //$('#idcurso').selectpicker('refresh');
  });


}
/********************************************************************************** */
//Función limpiar
function limpiar() 
{
   
  $("#nomb").val("");
  $("#desc").val("");
  $("#idcurso").val("");
  $("#comen").val("");
  $("#arch").val("");
  //$("#arch").attr("src", "");
  $("#idvideo").val("");
  
}

/********************************************************************************** */
//Función mostrar formulario
function mostrarform(flag) 
{
  limpiar();
  if (flag) 
  {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } 
  else 
  {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnagregar").show();
  }
}

/********************************************************************************** */

//Función cancelarform
function cancelarform() 
{
  limpiar();
  mostrarform(false);
}

/********************************************************************************** */

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
              url: '../ajax/video.php?op=listar',
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
      "iDisplayLength": 25, //Paginación
      "order"         : [[0, "desc"]], //Ordenar (columna,orden)
      }).DataTable();
}

/********************************************************************************** */
//Función para guardar o editar

function guardaryeditar(e) 
{
  e.preventDefault(); //No se activará la acción predeterminada del evento
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: "../ajax/video.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) 
    {
      //bootbox.alert(datos);
      bootbox.alert({ title: 'Administracion de Videos',
                      message: (datos)
                      });
 
      mostrarform(false);
      tabla.ajax.reload();
    }

  });
  limpiar();
}
/********************************************************************************** */
function mostrar(idvideo){
  $.post("../ajax/video.php?op=mostrar",{idvideo : idvideo}, function(data, status){
      data = JSON.parse(data);
      mostrarform(true);
     
     
      $("#idvideo").val(data.id_cursos);
      $("#nomb").val(data.nombre_videos);
      $("#desc").val(data.descripcion_videos);
      $("#comen").val(data.comentario_videos);
      $("#idcurso").val(data.curso_videos);      
      $("#video").val(data.ubicacion_videos);
      $("#idvideo").val(data.id_videos);
    })
}

/*********************************************************************************** */
//Función para desactivar registros
function desactivar(idadesactivar)
{
	bootbox.confirm('¿Está Seguro de desactivar el Video?' , 
  
  function(result){
		if(result)
        {
        	$.post("../ajax/video.php?op=desactivar", {idvideo : idadesactivar}, function(e){
        		bootbox.alert(e);//muestra el mensaje del metodo ajax
	          tabla.ajax.reload();
        	});	
        }
	})
}
/********************************************************************************** */
//Función para activar registros
function activar(idadesactivar) 
{
  bootbox.confirm("¿Está Seguro de activar el Video?", function (result){
    if (result)
    {
      $.post("../ajax/video.php?op=activar",{idvideo:idadesactivar},function (e){
          bootbox.alert(e);
          tabla.ajax.reload();
        });
    }
  })
}

init();
