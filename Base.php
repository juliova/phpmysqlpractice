<?php
    function conectar(){
        //Obtener variables de conexion a base del archivo ini.
        $var = parse_ini_file("app.ini");
        //Crear la conexión a la base con el url, usuario, contraseña y base.
        $conexion = mysqli_connect($var['url'], $var['usuario'], 
            $var['contrasena'], $var["base"]);
        //Revisar que la conexion funcione.
        if ($conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . 
            $conexion->connect_error;
        }
        //Poner la codificación del texto para que funcione con las 'ñ' y otros.
        $conexion->set_charset("utf8");
        //devolvemos la conexion.
        return $conexion;
    }
?>