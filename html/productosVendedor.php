<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
	// else
    // {
    //     session_destroy();
    //     session_start();
    // }
?>

<!DOCTYPE html>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Mis Productos</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/navbar.css">

    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/verDetalles.css">
    <link rel="stylesheet" href="../css/adminTables.css">

    <script src="../js/admin_messages.js"></script>

</head>
<body>

    <?php
        if($_SESSION == NULL){
            header('location:./login.php'); 
            // require '../assets/navs/headerBase.php';
        }
        elseif($_SESSION['privilegio'] == 'Vendedor'){
            require '../assets/navs/headerVendedor.php';
        }
	?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ??Desea eliminar el producto "Nombre Producto" con id "ID Producto"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="liveToastBtn" onclick="mostrarToast()" data-bs-dismiss="modal">Eliminar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Toast -->

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <i class="bi bi-check2-circle ounded me-2"></i>
            <!-- <img src="..." class="rounded me-2" alt="..."> -->
            <strong class="me-auto">Operaci??n exitosa</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" onclick="cerrarToast()"></button>
            </div>
            <div class="toast-body">
            Se elimino el producto correctamente.
            </div>
        </div>
    </div>


	<main class="contenedor">
		<div class="container details-product">
	        <div class="row justify-content-md-center">
                <h1>Revisi??n de Productos</h1>

                <div class="d-grid gap-2 d-md-block">
                    <a href="./registrarProductoNuevo.php" class='btn btn-success btn-sm'>
                    <i class='bi bi-plus'></i>Publicar nuevo producto</a>
                </div>                

                <table class="table table-light table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php
						// session_start();
						require '../assets/connections/database.php';
						$id_vendedor = $_SESSION['id_comprador'];
						$sentencia = "SELECT cptos.id, pto.nombre, pto.stock, pto.estado FROM catalogodeproductos cptos, producto pto
						WHERE cptos.producto_id = pto.id AND vendedor_id = '$id_vendedor'";
						$ejecutar = $con->query($sentencia);
						// $ejecutar = $con->query($sentencia);
						// $_SESSION['id_vendedor']

						while ($datos = $ejecutar->fetch_assoc()) {
							$id = $datos['id'];
							$nombre = $datos['nombre'];
							$stock = $datos['stock'];
							$estado = $datos['estado'];

							echo "<tr>";
							echo "<th scope='row'>$id</th>";
							echo "<td>$nombre</th>";
							echo "<td>$stock</th>";
							echo "<td>$estado</th>";
							echo "<td>
								<a href='verDetalles.php?id_producto=$id' class='btn btn-primary' title='Vista previa del Producto'><i class='bi bi-eye'></i></a>
								<a href='editarProducto.html?id=$id' type='button' class='btn btn-warning' title='Editar Producto' id='liveToastBtnAprobar'><i class='bi bi-pencil-fill'></i></a>
								<button type='button' class='btn btn-danger' title='Eliminar Producto' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                	<i class='bi bi-trash'></i>
                            	</button> </td>";
							echo "</tr>";

						  }
						?>
                      <!-- <tr> -->
                        <!-- <th scope="row">1</th> -->
                        <!-- <td>Producto 01</td> -->
                        <!-- <td>Excepteur ea nostrud</td> -->
                        <!-- <td>Por revisar</td> -->
                        <!-- <td> -->
                            <!-- <a href="verDetalles.html" class="btn btn-primary" title="Ver Detalles del Producto"><i class="bi bi-eye"></i></a> -->
                            <!-- <button type="button" class="btn btn-success" title="Aprobar Producto" id="liveToastBtnAprobar" onclick="mostrarToast()"><i class="bi bi-check-lg"></i></button> -->
                            <!-- Button remove - modal -->
                            <!-- <button type="button" class="btn btn-danger" title="Rechazar Producto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-x-lg"></i>
                            </button> -->
                        <!-- </td> -->
                      <!-- </tr>                                       -->

                    </tbody>
                </table>

	        </div>
	    </div>
    </main>
    <?php
        require '../assets/navs/footer.php';
	 ?>

</body>

</html>
