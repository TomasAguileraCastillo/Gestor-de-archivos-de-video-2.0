<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	/****************************************************************************** */
	//Implementamos un método para insertar registros
	public function insertar($nombre ,$apell ,$email, $coment, $imagen, $usuariosesion, $fecha_actual )
	{
		$sql="INSERT INTO	usuario	(	nombre_usuario,
										apellido_usuario,
										fechac_usuario,
										creadopor_usuario,
										imagen_usuario,
										email_usuario,
										comentario_usuario,
										condicion_usuario)
						VALUES		(	'$nombre',
										'$apell',
										'$fecha_actual',
										'$usuariosesion',
										'$imagen',
										'$email',
										'$coment',
										'1')";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementamos un método para editar registros
	public function editar($idusuario,$nombre,$apell,$email,$coment,$imagen1,$usuariosesion,$fecha_actual)
	{
		$sql="UPDATE usuario SET	nombre_usuario='$nombre',
									apellido_usuario='$apell',
									email_usuario='$email',
									comentario_usuario='$coment',
									imagen_usuario='$imagen1', 
									creadopor_usuario='$usuariosesion',
									fechac_usuario='$fecha_actual'
							WHERE	idarticulo='$idusuario'";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementamos un método para desactivar registros
	public function desactivar($idusuario )
	{
		$sql="UPDATE usuario SET condicion_usuario='0' WHERE id_usuario ='$idusuario'";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementamos un método para activar registros
	public function activar($idusuario)
	{
		$sql="UPDATE usuario SET condicion_usuario='1' WHERE id_usuario ='$idusuario'";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE id_usuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	
	 
	
	/****************************************************************************** 
	//Método para listar los registros activos
	public function listarActivos()
	{
		$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,a.descripcion,a.imagen,a.condicion 
		FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}*/

	
	 //Método para listar los registros
	 public function listar()
	 {
		 $sql = "SELECT * FROM usuario";
		 return ejecutarConsulta( $sql );

	 }
}

?>