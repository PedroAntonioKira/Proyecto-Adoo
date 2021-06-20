<?php
    if( isset($_POST['data']) ) {
        require '../assets/connections/database.php';
        $id = $_POST['data'];
        $con->real_query("SELECT CONCAT(info.nombre, ' ', info.apellidop, ' ', info.apellidom) nombre FROM 
            info, vendedor WHERE (vendedor.id = $id) AND (vendedor.info_id = info.id)");
        $resultado = $con->use_result();
        $fila = $resultado->fetch_assoc();
        $texto = json_encode($fila);
        echo $texto; // Devuelve objeto vendedor
    } else {
        die("Solicitud no válida.");
    }
?>