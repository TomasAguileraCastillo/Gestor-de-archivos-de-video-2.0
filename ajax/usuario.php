<?php 
	ob_start();
	if (strlen(session_id()) < 1){
		session_start() ;//Validamos si existe o no la sesión
	}
	if (!isset($_SESSION["nombre"])){
		header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
	}

			require_once "../modelos/Usuario.php";

			$usuario=new Usuario();

			$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
  			$nombre=isset($_POST["nomb"])? limpiarCadena($_POST["nomb"]):"";
			$apell=isset($_POST["apell"])? limpiarCadena($_POST["apell"]):"";
			$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
			$coment=isset($_POST["comen"])? limpiarCadena($_POST["comen"]):"";
			$imagen=isset($_POST["arch"])? limpiarCadena($_POST["arch"]):"";
			$usuariosesion	=	$_SESSION["nombre"];
			date_default_timezone_set('America/Santiago');
			$fecha_actual = date("Y-m-d h:i:s");






			switch ($_GET["op"]){
				case 'guardaryeditar':
  					/********************************************************** */
					//validacion de objeto imagen
					if (!file_exists($_FILES['arch']['tmp_name']) || 
					    !is_uploaded_file($_FILES['arch']['tmp_name'])){
						$imagen=$_POST["archactual"];
					}else{
						$ext = explode(".", $_FILES["arch"]["name"]);
						
						if ($_FILES['arch']['type'] == "image/jpg" || $_FILES['arch']['type'] == "image/jpeg" || $_FILES['arch']['type'] == "image/png"){
							$imagen1 = round(microtime(true)) . '.' . end($ext);
							move_uploaded_file($_FILES["arch"]["tmp_name"], "../files/usuarios/" . $imagen1);
						}
					}
					/********************************************************** */

 					if (empty($idusuario)){
						$rspta=$usuario->insertar($nombre ,$apell ,$email, $coment, $imagen1, $usuariosesion, $fecha_actual );
						echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
					}else{
						$rspta=$usuario->editar($idusuario,$nombre,$apell,$email,$coment,$imagen1,$usuariosesion,$fecha_actual);
						echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
					}

				break;

				case 'desactivar':
					$rspta=$usuario->desactivar($idusuario);
					echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
				break;

				case 'activar':
					$rspta=$usuario->activar($idusuario);
					echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
				break;

				case 'mostrar':
					$rspta=$usuario->mostrar($idusuario);
					//Codificar el resultado utilizando json
					echo json_encode($rspta);
				break;

				case 'listar':
					$rspta=$usuario->listar();
					//Vamos a declarar un array
					$data= Array();

					while ($reg=$rspta->fetch_object()){
						$data[]=array(
							"0"=>($reg->condicion_usuario)?
							'<button class="btn btn-primary" onclick="mostrar('.$reg->id_usuario.')">
								<i class="fa fa-pencil"></i>
							</button>'.
							'<button class="btn btn-danger" onclick="desactivar('.$reg->id_usuario.')">
								<i class="fa fa-close"></i>
							</button>':
							'<button class="btn btn-primary" onclick="mostrar('.$reg->id_usuario.')">
								<i class="fa fa-pencil"></i>
							</button>'.
							'<button class="btn btn-success" onclick="activar('.$reg->id_usuario.')">
								<i class="fa fa-check"></i>
							</button>',
							"1"=>$reg->nombre_usuario,
							"2"=>$reg->apellido_usuario,
							"3"=>$reg->fechac_usuario,
							"4"=>$reg->creadopor_usuario,
							"5"=>$reg->email_usuario,
							"6"=>$reg->comentario_usuario,
							"7"=>"<img src='../files/usuarios/".$reg->imagen_usuario."' height='50px' width='50px' >",
							"8"=>($reg->condicion_usuario)?'<span class="label bg-green">Activado</span>':
							'<span class="label bg-red">Desactivado</span>'
							);
					}
					$results = array(
						"sEcho"=>1, //Información para el datatables
						"iTotalRecords"=>count($data), //enviamos el total registros al datatable
						"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
						"aaData"=>$data);
					echo json_encode($results);

				break;

				 
			}
			//Fin de las validaciones de acceso
			
			/*}
			else
			{
			require 'noacceso.php';
			}
			}*/
ob_end_flush();
?>
