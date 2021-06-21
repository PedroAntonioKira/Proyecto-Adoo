<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}
	else{
		$privilegio = NULL;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	    <title>Carrito de compra | Productos</title>
		<meta charset="utf-8">

		<!--Estilos del formulario-->
		<link rel="stylesheet" href="../css/formMultiStep.css">
        <link rel="stylesheet" href="../css/carrito-vista.css">
		<script src="../js/jquery-3.6.0.js"></script>
		<script src="../js/main.js"></script>

		<!-- HEADER AND FOOTER -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/productos-propuesta.css">
		<link rel="stylesheet" href="../css/cardProducts.css">

		  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="../js/main.js"></script>

	</head>
	<body>
		<?php
			if($privilegio == NULL){
				require '../assets/navs/headerBase.php';
			}					
			elseif($privilegio == 'Comprador'){
				require '../assets/navs/headerComprador.php';

			}elseif($privilegio == 'Vendedor'){
				require '../assets/navs/headerVendedor.php';
			}else{
				require '../assets/navs/headerBase.php';
			}
		?>
    <div class="container">
        <div class="row" id="contenedor-row">

			<div id="messages-noti"></div>
			<div class="alert alert-warning alert-dismissible fade show" role="alert" id="notify-1">
				<strong>¡No hay stock suficiente! </strong><br>
				Actualmente no existe esa cantidad de productos en stock.<br>
				El sistema ya ingresó la cantidad máxima en stock.
			</div>
			<div class="alert alert-warning alert-dismissible fade show" role="alert" id="notify-2">
				<strong>¡Cantidad incorrecta!</strong><br> 
				<div id="noti-text-change"></div>
				La cantidad ya fue corregida por el sistema.
			</div>

            <table class="table" id="tablaCarrito">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody id="tbody">
                        <!-- PRODUCTOS SE RENDERIZAN AQUI  -->
            </tbody>
            </table>
        </div>
    </div>
</body>
	<?php require '../assets/navs/footer.php'; ?>
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
    <script src="../js/mostrarCarrito.js"></script>
		
	
</html>
