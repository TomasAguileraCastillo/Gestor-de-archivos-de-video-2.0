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
                                                            <h1 class="card-title  "><b>Administracion de Usuarios</b></h1>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="box-header with-border">
                                                                <button class="btn btn-primary " id="btnagregar" onclick="mostrarform(true)">
                                                                    <i class="bi bi-person-add"></i> Agregar Usuario
                                                                </button>
                                                            </div>
                                                            <br>
                                                            <div class="container">
                                                        <!--inicio de Formulario-->
                                                            <div class="panel-body" id="formularioregistros">
                                                                <form  class="row g-3 " name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                                                                    
                                                                    <span id="mensaje">Ingrese los datos correspondientes para el registro adecuado del video.</span>
                                                                    
                                                                    <div class="form-floating ">
                                                                        <input type="hidden" class="form-control" name="idusuario" id="idusuario">
                                                                    </div>

                                                                    <div class="form-floating col-md-4">
                                                                        <input type="text" class="form-control" id="nomb" name="nomb" autocomplete="off" placeholder="Nombre" onkeypress="return OnLchr(event)" required>
                                                                        <label   >Rut</label>
                                                                    </div>
                                                                    <div class="form-floating col-md-6">
                                                                       
                                                                    </div>
                                                                    <div class="form-floating col-md-6">
                                                                        <input type="text" class="form-control" id="nomb" name="nomb" autocomplete="off" placeholder="Nombre" onkeypress="return OnLchr(event)" required>
                                                                        <label   >Nombre</label>
                                                                    </div>
                                                                    <div class="form-floating col-md-6">
                                                                        <input type="text" class="form-control" id="apell" name="apell" autocomplete="off" placeholder="Apellido" onkeypress="return OnLchr(event)" required>
                                                                        <label  >Apellido</label>
                                                                    </div>
                                                                    <div class="form-floating col-md-6">
                                                                        <input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email" >
                                                                        <label  >Email</label>
                                                                    </div>
                                                                    <div class="col-md-6"></div>
                                                                    <div class="col-md-6">
                                                                        Imagen
                                                                                    <input  type="file"
                                                                                            class="form-control tamaño" 
                                                                                            name="arch" 
                                                                                            id="arch" 
                                                                                            accept="image/x-png,image/gif,image/jpeg" 
                                                                                            required>
                                                                                    <input  type="hidden"
                                                                                            name="archactual"
                                                                                            id="archactual">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div style="align-items: center; text-align: center;"> 
                                                                            <img    class="  shadow-lg p-1 mb-5 bg-body-tertiary rounded"
                                                                                    width="150px" 
                                                                                    height="140px" 
                                                                                    id="imagenmuestra">
                                                                        </div>
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
                                                                    <caption><b>Listado de Usuarios Registrados</b></caption>
                                                                    <thead class="table-light">
                                                                        <th>Opciones</th>
                                                                        <th>Nombre</th>
                                                                        <th>Apellido</th>
                                                                        <th>Fech. Creacion</th>
                                                                        <th>Creacion Us.</th>
                                                                        <th>Email</th>
                                                                        <th>Imagen</th>
                                                                        <th>Comentario</th>
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
?>
<script type="text/javascript" src="scripts/usuario.js"></script>
<?php
}
ob_end_flush();//liberacion de espacio en buffer
?>
