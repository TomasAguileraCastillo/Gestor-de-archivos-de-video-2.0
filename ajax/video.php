<?php
 
session_start(); //iniciacion de session de usuario
//archivo ajax
//llama al modelo de la clase para creacion de objeto
require_once "../modelos/Video.php";
//creacion de objeto instanciando la clase, objeto de la clase Personal
$videos=new Videos();


//obtencion de datos desde formulario
//validacion exixtencia de variable por metodo post, condicional de una linea
 

$idvideos       = isset( $_POST["idvideo"   ])? limpiarCadena( $_POST[ "idvideo" ] ):"";
$nombre         = isset( $_POST["nomb"      ])? limpiarCadena( $_POST[ "nomb"    ] ):"";
$descripcion    = isset( $_POST["desc"      ])? limpiarCadena( $_POST[ "desc"    ] ):"";
$comentario     = isset( $_POST["comen"     ])? limpiarCadena( $_POST[ "comen"   ] ):"";
$curso          = isset( $_POST["curso"     ])? limpiarCadena( $_POST[ "curso"   ] ):"";
$video          = isset( $_POST["arch"     ])? limpiarCadena( $_POST[ "arch"    ] ):"";
$idcurso        = isset( $_POST["idcurso"   ])? limpiarCadena( $_POST[ "idcurso" ] ):"";

$usuariosesion	=	$_SESSION["nombre"];
date_default_timezone_set('America/Santiago');
$fecha_actual = date("Y-m-d h:i:s");

  
//estructura switch para evaluacion de los valores consultados al modelo
switch ($_GET["op"]){
     
    case 'guardaryeditar':
 //* ************************************************************************************************************
					/*validacion de objeto imagen y tamaño */






                        $file_size = $_FILES['arch']['size'];
                        if($file_size > 1000000000){
                            echo "<script>alert('El Archivo es demasiado grande para cargar')</script>";
                            //echo "<script>window.location = '../index.php'</script>";
                        }else{
                            echo "<script>alert('El Archivo esta bien para cargar')</script>";
                        }

                        if (!file_exists($_FILES['arch']['tmp_name']) ||  !is_uploaded_file($_FILES['arch']['tmp_name'])){

                            echo "<script>alert('El Archivo es nuevo')</script>";

                            }else{
                                    $ext = explode(".", $_FILES["arch"]["name"]);

                                    if ($_FILES['arch']['type'] == "video/mp4" || $_FILES['arch']['type'] == "video/x-matroska")
                                    {
                                        $videos1 = round(microtime(true)) . '.' . end($ext);
                                        move_uploaded_file($_FILES["arch"]["tmp_name"], "../files/videos/" . $videos1);
                                    }else
                                        {
                                            echo "<script>alert('Formato de Video Equivocado')</script>";
                                        
                                        }
                                }

					/********************************************************** */


					if (empty($idvideos)){
						$rspta=$videos->insertar($nombre,$descripcion,$comentario,$fecha_actual,$usuariosesion,$idcurso,$videos1);
						echo $rspta ? "Video registrado" : "Video no se pudo registrar";
					}else{
						$rspta=$videos->editar($idvideos,$nombre,$descripcion,$curso,$comentario,$video1);
						echo $rspta ? "Video actualizado" : "Video no se pudo actualizar";
					}
 break;

   /************************************************************************************************************** */
   case 'desactivar':
        $rspta=$videos->desactivar($idvideos);
        echo $rspta ? "Registro Desactivado " : "Registro no se puede Desactivar";
        break;
    /************************************************************************************************************** */
   case 'activar':
    
       $rspta=$videos->activar($idvideos);
        echo $rspta ? "Registro Activado" : "Registro no se puede Activar";
        break;
    /************************************************************************************************************** */
    case 'mostrar':
        
        $rspta=$videos->mostrar($idvideos); /*Codificar el resultado utilizando json*/
       
        echo json_encode($rspta);
        break;
    /************************************************************************************************************** */
    case 'listar':
    
        $rspta=$videos->listar();
        //se declara un array
        $data = Array();

            while($reg = $rspta->fetch_object()){
                $data[]=array(
                    /*por posiscion de registro segun el indice  */
                    //validacion con estructura condicional de una sola linea
                    "0"=>($reg->condicion_videos) ?
                    '<button class="btn btn-primary " onclick="mostrar('.$reg->id_videos.')">
                        <i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger " onclick="desactivar('.$reg->id_videos.')">
                        <i class="fa fa-close"></i> </button>':
                    '<button class="btn btn-primary" onclick="mostrar('.$reg->id_videos.')">
                        <i class="fa fa-pencil"></i> </button>'.
                    ' <button class="btn btn-success" onclick="activar('.$reg->id_videos.')">
                        <i class="fa fa-check"></i> </button>',

                    
                    "1"=>$reg->nombre_videos,
                    "2"=>$reg->descripcion_videos,
                    "3"=>$reg->curso_videos,
                    "4"=>$reg->comentario_videos,
                    "5"=>$reg->fechasubid_videos,
                    "6"=>$reg->subidopor_videos,
/*link Usuario*/    "7"=>   "<div class='input-group'>
                                <a class='btn btn-outline-secondary border-0' href='../vistas/Reproductor/nuevoreproductor.php?Video=".$reg->ubicacion_videos." ' target='_blank' role='button'>
                                    <i class='bi bi-lightning-charge-fill'></i>
                                </a>
                                <button type='button' class='btn btn-outline-secondary border-0' onclick='copiar()'>
                                    <i class='bi bi-clipboard'></i>
                                </button>
                            </div>",

/*imagen miniat*/   /*"8"=>"  <video width='100%' height='35'>
                                     <source src='../files/videos/".$reg->ubicacion_videos."'  />
                                    Su navegador no soporta contenido multimedia.
                            </video>",*/
                        
                    "8"=>($reg->condicion_videos)?
                            '<span class="badge bg-success" >Activado</span>':
                            '<span class="badge bg-danger">Desactivado</span>'
                );
            }
            $results = array(
                "sEcho"=>1, //Información para el datatables
                "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count( $data ), //enviamos el total registros a visualizar
                "aaData"=>$data);
            echo json_encode( $results );
        break;

        case "seleccionCurso":
                //require_once "../modelos/Video.php";
                $rspta=$videos->select(); // instanciacion de clase
                while ($reg = $rspta->fetch_object())
                {
                   // echo '<option value='. $reg->id_cursos . '>' .$reg->nombre_cursos.' </option>';
                    echo '<option value='. $reg->nombre_cursos . '>' .$reg->nombre_cursos.' </option>';
                }
            
                break;
         /************************************************************************************************************ */
         case 'verificar':
            $loginac=$_POST['loginac'];
            $claveac=  $_POST['claveac'];
            $rspta=$videos->verificar($loginac, $claveac);

            $fetch=$rspta->fetch_object();
            if(isset($fetch)){
                $_SESSION['idusuario']=$fetch->id_usuario;
                $_SESSION['nombre']=$fetch->nombre_usuario;
                $_SESSION['imagen']=$fetch->imagen_usuario;
            }
            echo json_encode($fetch);

            break;
        /************************************************************************************************************ */
         case 'salir':
            session_unset(); // limpia las variables de sesion
            session_destroy(); //destruye sesion
            header ("location: ../index.php"); //redirecciona a la pantalla de inicio
}
 

ob_end_flush();//liberacion de espacio en buffer
?>