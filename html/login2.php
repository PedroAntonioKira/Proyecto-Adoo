<?php
  session_start();
  require '../assets/connections/database.php';

  if(isset($_POST['Aceptar'])){
    if(!empty($_POST['correo']) && !empty($_POST['contrasena'])){
      $correo = $_POST['correo'];
      $contrasena = $_POST['contrasena'];

      $records = "SELECT * FROM usuario WHERE correo = '$correo'";

      $ejecutar = $con->query($records);
      $datos = $ejecutar->fetch_assoc();
      $message = '';

      if(($datos != NULL) && ($datos['contrasena']==$contrasena)){
        if($datos['estatus'] == 'VERIFICADO'){
          $correo = $datos['correo'];
          $sentencia = "SELECT info.nombre,info.apellidop,info.apellidom,info.institucion,comprador.id,usuario.correo,usuario.contrasena,usuario.estatus,privilegios.privilegio FROM info INNER JOIN comprador ON comprador.info_id = info.id INNER JOIN usuario ON comprador.usuario_correo = usuario.correo INNER JOIN privilegios ON privilegios.id = usuario.privilegios_id WHERE usuario.correo = '$correo'";
          $columnas = $con->query($sentencia);
          $obtenido = $columnas->fetch_assoc();

          $_SESSION['nombre']=$obtenido['nombre'];
          $_SESSION['apellidop']=$obtenido['apellidop'];
          $_SESSION['apellidom']=$obtenido['apellidom'];
          $_SESSION['institucion']=$obtenido['institucion'];
          $_SESSION['id_comprador']=$obtenido['id'];
          $_SESSION['correo']=$obtenido['correo'];
          $_SESSION['contrasena']=$obtenido['contrasena'];
          $_SESSION['estatus']=$obtenido['estatus'];
          $_SESSION['privilegio']=$obtenido['privilegio'];

          header('location: ../index.php');

        }else{
          $message = "<p style='color:#FF0000'>Tu estatus es inactivo<p/>";
        }
      }else{
        $message = "<p style='color:#FF0000'>No hay coincidencia en la base de datos<p/>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Cuenta | Iniciar Sesion</title>
    <meta charset="utf-8">


    <!--bootstrap-->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <script src="../js/productos.js"></script>
    <script src="../js/scriptp.js"></script>

    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/login.css">

    <!-- <script src="../js/jquery-3.6.0.js"></script> -->
    <script src="../js/main.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navbar.css">

</head>
<body>

   	<?php require '../assets/navs/headerBaseHtml.php'; ?>
  <main>
    <div class="container">
      <div class="info">
        <h1 style="color:white;">
          Inicio de sesion <br>
          Comprador
        </h1>
      </div>
    </div>

    <div class="form">
      <div class="thumbnail">
        <img src="../img/logo.png" />
      </div>

      <form class="login-form" action="login2.php" method="post">
        <input type="email" name="correo" placeholder="Correo" required autocomplete="off">
        <input type="password" name="contrasena" placeholder="Contraseña" required autocomplete="off">
        <button type="submit" name="Aceptar">Aceptar</button>
      </form>
      <?php if (!empty($message)): ?>
        <p><?=  $message ?></p>
      <?php endif; ?>
        <br>
        <p>¿No tienes cuenta aun? <a href="crearCuentaComprador.php"> <br>Crea Una Cuenta ahora</a></p>
      </main>

      <?php require '../assets/navs/footer.php'; ?>

      <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
      <script type="text/javascript" src="../js/menuPrincipal01.js"></script>
</body>
</html>
