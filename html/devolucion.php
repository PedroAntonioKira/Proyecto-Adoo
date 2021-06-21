<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}

$idComp = $_GET['id'];
//	INSERT INTO `registrodechat` (`id`, `comprador_id`, `vendedor_id`, `catalogodeproductos_id`) VALUES (NULL, '1', '1', '1')
//	INSERT INTO `chat` (`id`, `idregistroDeChat`, `fecha`, `mensaje`, `correoEnvia`) VALUES (NULL, '1', current_timestamp(), 'Hola', 'joss.alberto.r.m@gmail.com')
?>


<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de compras</title>
		<!--Links del filtrador-->
		<link rel="stylesheet" href="../css/estilosFiltrador.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Estilos del formulario-->
		<link rel="stylesheet" href="../css/formMultiStep.css">
		<script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/buscar.js"></script>
		<!-- HEADER AND FOOTER -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/verDetalles.css">
    <link rel="stylesheet" href="../css/adminTables.css">

		<!-- Carro -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="../js/main.js"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/verDetalles.css">

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
			require '../assets/navs/headerBase.php';

		}elseif($_SESSION['privilegio'] == 'Comprador'){
			require '../assets/navs/headerComprador.php';
		}elseif($_SESSION['privilegio'] == 'Vendedor'){
			require '../assets/navs/headerVendedor.php';
		}
	?>

<center>
	<main class="contenedor">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="input-group mb-3">


                  			<label for="select-date" class="form-label">Lugar</label>

                  				<select class="form-select" aria-label="Default select example" id="select-date" name="PuntoEntrega">
                  					<option value="-1" selected disabled>Selecciona el punto de entrega</option>
                  			<?php


                  				$entrega_vendedor = "SELECT DISTINCT puntos_entrega_vendedor.dia_entrega,
                          puntos_entrega_vendedor.hora_entrega,puntos_entrega_vendedor.Transporte,
                          puntos_entrega_vendedor.linea_o_Institucion,puntos_entrega_vendedor.estacion_o_referencia
                          FROM puntos_entrega_vendedor
                          INNER JOIN vendedor ON vendedor.usuario_correo = puntos_entrega_vendedor.correo_vendedor
                          INNER JOIN catalogodeproductos ON catalogodeproductos.vendedor_id = vendedor.id
                          INNER JOIN compras ON compras.id_vendedor = vendedor.id
                          INNER JOIN entregas_compras ON entregas_compras.id_compra= compras.id WHERE compras.id ='$idComp'";


                  				$ejecutar = $con->query($entrega_vendedor);

                  				while($datos = $ejecutar->fetch_assoc()){
                  					$transporte = $datos['Transporte'];
                  					$linea_esc = $datos['linea_o_Institucion'];
                  					$estacion = $datos['estacion_o_referencia'];
                  					$dia_entrega = $datos['dia_entrega'];
                  					$hora_entrega = $datos['hora_entrega'];

                  					$texto = $transporte.",".$linea_esc.",".$estacion.","."proximo ".$dia_entrega.",".$hora_entrega;
                  					echo "<option value='".$texto."'>$texto</option>";
                  				}


                  			?>
                      </select>
                      </div>

                      <br>
                        <h3>Descriva el problema</h3>
                        <textarea name="comentario" rows="8" cols="80" placeholder="Escriba el por que de su devolución" class="form-textarea">

                        </textarea>
                  			<!-- <label for="input-fecha" class="form-label" id="fecha">Fecha</label>
                  			<input type="text" id="input-fecha" name="fechaEntrega" disabled>
                  			</div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div> -->

  </main>
</center>
	<?php require '../assets/navs/footer.php'; ?>

</body>

</html>
