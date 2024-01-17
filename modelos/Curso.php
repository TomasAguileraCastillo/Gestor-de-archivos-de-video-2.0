<?php
//Incluye inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

    Class Curso
    {
        //Implementamos nuestro constructor
        public function __construct()
        {

        }
        /****************************************************************************** */

        //Implementamos un método para insertar registros

        public function insertar($nombre, $descripcion, $comentario, $usuario, $fechasubida)
        {

           $sql = "INSERT INTO `cursos` (   nombre_cursos,
                                            descripcion_cursos,
                                            comentario_cursos,
                                            creadopor_cursos,
                                            fechacreacion_cursos,
                                            condicion_cursos)
                    VALUES              (   '$nombre', 
                                            '$descripcion', 
                                            '$comentario', 
                                            '$usuario', 
                                            '$fechasubida', 
                                            '1')";
           return ejecutarConsulta( $sql );
        }
        /****************************************************************************** */
        //Implementamos un método para editar registros
        public function editar($idcursos, $nombre, $descripcion, $comentario, $fechasubida, $usuario)
        {
            $sql="  UPDATE `cursos`
                    SET nombre_cursos='$nombre',
                        descripcion_cursos='$descripcion',
                        comentario_cursos='$comentario',
                        creadopor_cursos='$usuario',
                        fechacreacion_cursos='$fechasubida',
                        condicion_cursos='1'
                     WHERE id_cursos  ='$idcursos' ";
            return ejecutarConsulta( $sql );
        }
        /****************************************************************************** */
          //Implementamos un método para desactivar registros
          public function desactivar( $idcursos )
          {
              $sql = "UPDATE cursos SET condicion_cursos='0' WHERE id_cursos='$idcursos'";
              return ejecutarConsulta( $sql );
          }
        /****************************************************************************** */
        //Implementamos un método para activar registros
        public function activar( $idcursos )
        {
            $sql = "UPDATE cursos SET condicion_cursos='1' WHERE id_cursos='$idcursos'";
            return ejecutarConsulta( $sql );
        }
        /****************************************************************************** */
        //Implementar un método para mostrar los datos de un registro a modificar
        public function mostrar($idcursos)
        {
            $sql = "SELECT * FROM cursos WHERE id_cursos='$idcursos'";
            return ejecutarConsultaSimpleFila( $sql );
        }
        /****************************************************************************** */
        //Método para listar los registros
        public function listar()
        {
            $sql = "SELECT * FROM cursos";
            return ejecutarConsulta( $sql );

        }
        /****************************************************************************** */
  


    
    }
?>