<?php

session_start();
require '../assets/connections/database.php';
    if(isset($_POST['buscar'])){
        $busquedaUsuario = trim($_POST['busqueda']);
        $selectQuery = "
        SELECT * FROM producto, descripcion, subcategoria, categorias, listacategorias
        WHERE (producto.nombre LIKE 'HUAWEI' OR descripcion.marca LIKE 'HUAWEI' OR categorias.categoria LIKE 'HUAWEI' 
        OR categorias.categoria LIKE 'HUAWEI') AND (producto.descripcion_id = descripcion.id)
        AND (producto.listacategorias_id = listacategorias.id) 
        AND (listacategorias.subcategoria_id = subcategoria.id)
        AND (listacategorias.categorias_id = categorias.id);
        ";
        $ejecutar = $con->query($selectQuery);

    }
    else{
        ECHO "NO RECIBI BUSQUEDA";
    }
?>