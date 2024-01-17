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


}
/********************************************************************************** */
//Función limpiar
function limpiar() 
{
   
  $("#nomb").val("");
  $("#desc").val("");
  $("#comen").val("");
  $("#idcurso").val("");
 //
  
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
              url: '../ajax/curso.php?op=listar',
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

/********************************************************************************** */
//Función para guardar o editar

function guardaryeditar(e) 
{
  e.preventDefault(); //No se activará la acción predeterminada del evento
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: "../ajax/curso.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) 
    {
      bootbox.alert(datos);
      mostrarform(false);
      tabla.ajax.reload();
    }

  });
  limpiar();
}
/********************************************************************************** */
function mostrar(idcurso){
  $.post("../ajax/curso.php?op=mostrar",{idcurso : idcurso}, function(data, status){
      data = JSON.parse(data);
      mostrarform(true);
     
     
      $("#idcurso").val(data.id_cursos);
      $("#nomb").val(data.nombre_cursos);
      $("#desc").val(data.descripcion_cursos);
      $("#comen").val(data.comentario_cursos);
      
    })
}

/*********************************************************************************** */
//Función para desactivar registros
function desactivar(idadesactivar)
{
	bootbox.confirm("¿Está Seguro de desactivar el Curso?", function(result){
		if(result)
        {
        	$.post("../ajax/curso.php?op=desactivar", {idcurso : idadesactivar}, function(e){
        		bootbox.alert(e);//muestra el mensaje del metodo ajax
	          tabla.ajax.reload();
        	});	
        }
	})
}
/********************************************************************************** */
//Función para activar registros
function activar(idaactivar) 
{
  bootbox.confirm("¿Está Seguro de activar el Curso?", function (result){
    if (result)
    {
      $.post("../ajax/curso.php?op=activar",{idcurso:idaactivar},function (e){
          bootbox.alert(e);
          tabla.ajax.reload();
        });
    }
  })
}
init();
