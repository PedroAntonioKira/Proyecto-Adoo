<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/search.css">
    <title>Search</title>

	<!--Estilos del menu superior-->
	<link rel="stylesheet" href="../css/menuPrincipal01.css">
	<link rel="stylesheet" href="../css/Cuerpo01.css">

	<!--Estilos del slider-->
	<link rel="stylesheet" href="../css/all.min.css">
	<link rel="stylesheet" href="../css/recompra.css">

	<script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>

    <script src="../js/admin_messages.js"></script>
</head>
<body>
  <?php
  	if($_SESSION == NULL){
  		require '../assets/navs/headerBaseHtml.php';

  	}elseif($_SESSION['privilegio'] == 'Comprador'){
  		require '../assets/navs/headerCompradorHtml.php';
  	}


  ?>
    <div class="background">
        <div class="container screen-block center-all">
            <div class="row">
                <!-- <form action="" method="get" class="search"> -->
                    <div class="box-search center-all">
                        <input type="text" name="text" class="input-search" autocomplete="off" placeholder="Search...">
                        <a href="buscarProductos.php" class="btn-search center-all"><i class="bi bi-search"></i></a>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/menuPrincipal01.js"></script>
</body>
</html>
