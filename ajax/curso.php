<?php 
	
	session_start();
	//archivo ajax
	//llama al modelo de la clase para creacion de objeto
	 $_SESSION["nombre"] ;
	require_once "../modelos/Curso.php";
	$curso = new Curso();


	//obtencion de datos desde formulario
	//validacion exixtencia de variable por metodo post, condicional de una linea
	$idcursos	=	isset($_POST["idcurso"])? limpiarCadena($_POST["idcurso"]):"";
	$nombre	=	isset($_POST["nomb"])? limpiarCadena($_POST["nomb"]):"";
 	$descrip	=	isset($_POST["desc"])? limpiarCadena($_POST["desc"]):"";
	$coment	=	isset($_POST["comen"])? limpiarCadena($_POST["comen"]):"";
	$usuario	=	$_SESSION["nombre"];
	date_default_timezone_set('America/Santiago');
	$fecha_actual = date("Y-m-d h:i:s");
			 

	switch ($_GET["op"]){
		case 'guardaryeditar':
				/********************************************************** */

					if (empty($idcursos)){
						$rspta=$curso->insertar($nombre,$descrip,$coment,$usuario,$fecha_actual);
						echo $rspta ? "Curso registrado" : "Curso no se pudo registrar";
					}else{
						 
						$rspta=$curso->editar($idcursos, $nombre, $descrip, $coment, $usuario, $fecha_actual);
						echo $rspta ? "Curso actualizado" : "Curso no se pudo actualizar";
					}

		break;
		case 'desactivar':
					$rspta=$curso->desactivar($idcursos);
					echo $rspta?"Registro Desactivado":"Registro no se puede desactivar";
		break;
		case 'activar':
					$rspta=$curso->activar($idcursos);
					echo $rspta?"Registro Activado":"Registro no se puede activar";
		break;
		case 'mostrar':
					$rspta=$curso->mostrar($idcursos);
					//Codificar el resultado utilizando json
					echo json_encode($rspta);
		break;
		case 'listar':
					$rspta=$curso->listar();
					//Vamos a declarar un array
					$data= Array();

					while ($reg=$rspta->fetch_object()){
						$data[]=array(
							"0"=>($reg->condicion_cursos)? '<button class="btn btn-primary" onclick="mostrar('.$reg->id_cursos.')"><i class="fa fa-pencil"></i></button>' .
							' <button class="btn btn-danger" onclick="desactivar('.$reg->id_cursos.')"><i class="fa fa-close"></i></button>' :
							'<button class="btn btn-primary" onclick="mostrar('.$reg->id_cursos.')"><i class="fa fa-pencil"></i></button>' .
							'<button class="btn btn-success" onclick="activar('.$reg->id_cursos.')"><i class="fa fa-check"></i>	</button>',
							"1"=>$reg->nombre_cursos,
							"2"=>$reg->descripcion_cursos,
							"3"=>$reg->comentario_cursos,
							"4"=>$reg->creadopor_cursos,
							"5"=>$reg->fechacreacion_cursos,
 							"6"=>($reg->condicion_cursos)?'<span class="label bg-green">Activado</span>':
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

?>
