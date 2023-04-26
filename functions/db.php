<?php
    // Aquí creo la conexión con mi BD local - cambiar valores a lo necesario
    $c = new mysqli('localhost', 'root', '', 'ab_db');

    // Validar conexion con la BD
    if ($c) {
        echo "Conexion establecida";
    } else {
        echo "Error en la conexion";
    }
    

?>