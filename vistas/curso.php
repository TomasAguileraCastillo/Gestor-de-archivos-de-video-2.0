<?php
ob_start();//activacion en almacenamiento de buffer
session_start(); //iniciacion de session de usuario

if (!isset($_SESSION['nombre']))//si la variable de session no existe 
{
    header("location:login.php");
}
else
{
require ("header.php");

?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../public/img/solo_pino.JPG" alt="" height="60" width="60">
</div>
  
<style>
    img.tamaño{
    max-width:30%;
    max-height:30%;
}
</style>
<script>
function copiar(){
    var origen = document.getElementById('target1');
    var copyFrom = document.createElement("textarea");
    copyFrom.textContent = origen.value;
    var body = document.getElementsByTagName('body')[0];
    body.appendChild(copyFrom);
    copyFrom.select();
    document.execCommand('copy');
    body.removeChild(copyFrom);
    //destino.focus();
    //document.execCommand('paste');
}
 </script>
         
                                           
                                              <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h1 class="card-title  "><b>Administracion de Listado de Cursos</b></h1>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="box-header with-border">
                                                                <button class="btn btn-primary " id="btnagregar" onclick="mostrarform(true)">
                                                                    <i class="bi bi-person-add"></i> Agregar Curso
                                                                </button>
                                                            </div>
                                                            <br>
                                                            <div class="container">
                                                        <!--inicio de Formulario-->
                                                            <div class="panel-body" id="formularioregistros">
                                                                <form  class="row g-3 " name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                                                                    
                                                                    <span id="mensaje">Ingrese los datos correspondientes para el registro adecuado del Curso.</span>
                                                                    
                                                                    <div class="form-floating ">
                                                                        <input id="idcurso" type="hidden" class="form-control"   name="idcurso">
                                                                    </div>
                                                                    <div class="form-floating col-md-6">
                                                                        <input type="text" class="form-control" id="nomb" name="nomb" autocomplete="off" placeholder="Nombre" onkeypress="return OnLchr(event)" required>
                                                                        <label   >Nombre del Curso</label>
                                                                    </div>
                                                                    <div class="form-floating col-md-6">
                                                                        <input type="text" class="form-control" id="desc" name="desc" autocomplete="off" placeholder="Apellido" onkeypress="return OnLchr(event)" required>
                                                                        <label  >Descripcion del Curso</label>
                                                                    </div>
                                                                    <div class=" form-floating col-md-12">
                                                                            <input type="text" class="form-control" id="comen" name="comen" onkeypress="return OnLchr(event)" onblur="clen(comentarios)"
                                                                             autocomplete="off" placeholder="Comentarios" required>
                                                                             <label >Comentarios</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <button class="btn btn-primary  col-md-2" type="submit" id="btnGuardar">
                                                                            <i class="fa fa-save"></i> Guardar
                                                                        </button>
                                                                        <button class="btn btn-danger  col-md-2" onclick="cancelarform()" type="button">
                                                                            <i class="fa fa-arrow-circle-left"></i> Cancelar
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--fin form-->
                                                        <!--inicio datatable-->
                                                            <br>
                                                            <div class="panel-body table-responsive" id="listadoregistros">
                                                                <table class="table caption-top table-bordered" id="tbllistado">
                                                                    <caption><b>Listado de Videos Registrados</b></caption>
                                                                    <thead class="table-light">
                                                                        <th>Opciones</th>
                                                                        <th>Nombre del Curso</th>
                                                                        <th>Descripción</th>
                                                                        <th>Comentario</th>
                                                                        <th>Creado por:</th>
                                                                        <th>fech_Actualización</th>
                                                                        <th>Condición</th>
                                                                    </thead>
                                                                    <tbody class="table-group-divider">
                                                                    </tbody>
                                                                    <tfoot>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        <!--Fin datatable-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            
                 


<?php
require 'footer.php';
}
ob_end_flush();//liberacion de espacio en buffer
?>
<script type="text/javascript" src="scripts/curso.js"></script>