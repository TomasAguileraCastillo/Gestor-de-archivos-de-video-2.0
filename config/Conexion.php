<?php

//se incluye el archivo de configuracion global, con las constantes globales
require_once "global.php";

//se realiza instanacia de controlador para la conexion a la base de datos
$conexion = new mysqli( DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME );

//consulta a la base de datos con la codificacion de caracteres
mysqli_query( $conexion, 'SET NAMES "'.DB_ENCODE.'"' );

//se valida tenemos un posible error en la conexión lo mostramos
if ( mysqli_connect_errno() )
 {
    //nos muestra el mensaje indicando el error junto al codigo
    printf( 'Falló conexión a la base de datos: %s\n', mysqli_connect_error() );
    exit();
}

//consultas de peticion y validacion a la base de datos



//validacion de existencia de funciones
//si no existe
if ( !function_exists( 'ejecutarConsulta' ) )
 {
    //********************************************************************** */
    //se define la funcion Ejecutar consulta
    function ejecutarConsulta( $sql )
 {
        //llama a la variable global declarada al inicio
        global $conexion;
        //se define la variable contenedora de resultado de consulta
        return ($conexion->query( $sql ));
        //$query = $conexion->query( $sql );
        //retorna el resultado de la funcion
        //return $query;
    }

    //*********************************************************************** */
    //funcion para resultado de consulta a una fila
    function ejecutarConsultaSimpleFila( $sql )
 {
        global $conexion;
        //obtiene una fila como resultado en la variable
        $query = $conexion->query( $sql );
        //se carga el arreglo con la fila completa
        $row = $query->fetch_assoc();
        //devuelve el resultado de la fila
        return $row;
    }

    //************************************************************************ */
    //funcion que devuelve la llave primaria del registro
    function ejecutarConsulta_retornarID( $sql )
 {
        global $conexion;
        $query = $conexion->query( $sql );
        return $conexion->insert_id;
    }


    //************************************************************************ */
    //funcion que limpia los caracteres especiales de la cadena
    function limpiarCadena( $str )
 {
        global $conexion;
        $str = mysqli_real_escape_string( $conexion, trim( $str ) );
        return htmlspecialchars( $str );
    }
}
?>