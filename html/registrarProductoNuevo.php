<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/navbar.css">

    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/registrarProductoNuevo.css">
    <!--JS REGISTRAR PRODUCTO-->
    <script src="../js/registrarProductoNuevo.js"></script>

</head>
<body>

    <?php
        require '../assets/navs/headerVendedorHtml.php';
	 ?>
    <div class="container">
        <div class="row">
            <!-- = = = = = = BOTONES SELECCIÓN TIPO DE PRODUCTO = = = = = = -->
            <h1>Publicar Producto.</h1>
            <h4>Clasifica el tipo de producto que vas a vender.</h4>
            <div class="form-check">
                <input onclick="productType('dispositivos')" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" >
                <label class="form-check-label" for="flexRadioDefault1">
                  Dispositivos electrónicos.
                </label>
            </div>
            <div class="form-check">
                <input onclick="productType('componentes')" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  Componentes electrónicos.
                </label>
            </div>

            <!-- = = = = = = FORMULARIO 1: DISPOSITIVOS = = = = = = clase visible = 'collapse show' -->
            <div class="collapse" id="collapseExample1">
                <h4>Rellena los datos del producto que vendes.</h4>
                <form class="container" method="POST" action="registrarProductoCnx.php">
                    <div class="row">

                        <div class="col-4">
                            <div class="mb-3"> <!-- Categoria -->
                                <label for="exampleInputEmail1" class="form-label">Categoria del producto</label>
								<select class="form-select" id="inputGroupSelect01" name="categoria" required>
									<option value="1" selected>Computo</option>
									<option value="2">Telefonía</option>
									<!-- <option value="3">Electrónica</option>
									<option value="4">Medición</option>
									<option value="5">Refacciones</option> -->
								</select>
							</div>
                        </div>

                        <div class="col-4">
                            <div class="mb-4"> <!-- Nombre/titulo -->
                                <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" placeholder="Laptop, celular, tableta, etc." id="exampleInputEmail1" aria-describedby="emailHelp" name="nombreProducto" required>
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3"> <!-- Marca -->
                                <label for="exampleInputEmail1" class="form-label">Marca</label>
                                <input type="text" class="form-control" placeholder="Samsung, Huawei, Xiaomi, etc." id="exampleInputEmail1" aria-describedby="emailHelp" name="marca" required>
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                            </div>
                        </div>
                        <!--<div class="col-3">
                            <div class="mb-3">  Modelo -->
                                <!-- <label for="exampleInputEmail1" class="form-label">Modelo</label> -->
                                <!-- <input type="text" class="form-control" placeholder="Huawei D15, Samsung A70s, etc." id="exampleInputEmail1" aria-describedby="emailHelp" name=""> -->
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                            <!-- </div>
                        </div>    -->

                        <!-- <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">¿Título de la publicación?</label>
                                <input type="text" class="form-control" placeholder="Celular Samsung a10s" id="exampleInputEmail1" aria-describedby="emailHelp" name="">
                            </div>
                        </div>    -->

                        <!--<div class="col-12">
                            <div class="mb-3">  Colores
                                <label for="exampleColorInput" class="form-label">Colores</label>
                                <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                            </div>
                        </div> -->
						<h5>Medidas</h5>

						<div class="col-3">
                            <div class="mb-3"> <!-- Alto -->
                                <label for="exampleInputEmail1" class="form-label">Alto</label>
                                <div class="input-group mb-3">
                                    <!-- <span class="input-group-text" id="basic-addon1">$</span>                                     -->
                                    <input type="number" min="1" step="any"  class="form-control" placeholder="00" name="altoprod" required>
                                    <span class="input-group-text" id="basic-addon2">inch.</span>
                                </div>
                            </div>
                        </div>
						<div class="col-3">
                            <div class="mb-3"> <!-- Alto -->
                                <label for="exampleInputEmail1" class="form-label">Ancho</label>
                                <div class="input-group mb-3">
                                    <!-- <span class="input-group-text" id="basic-addon1">$</span>                                     -->
                                    <input type="number" min="1" step="any"  class="form-control" placeholder="00" name="anchoprod" required>
                                    <span class="input-group-text" id="basic-addon2">inch.</span>
                                </div>
                            </div>
                        </div>
						<div class="col-3">
                            <div class="mb-3"> <!-- Tamaño pantalla -->
                                <label for="exampleInputEmail1" class="form-label">Tamaño de pantalla</label>
                                <div class="input-group mb-3">
                                    <!-- <span class="input-group-text" id="basic-addon1">$</span>                                     -->
                                    <input type="number" min="1" step="any"  class="form-control" placeholder="00" name="tamañopantalla" required>
                                    <span class="input-group-text" id="basic-addon2">inch.</span>
                                </div>
                            </div>
                        </div>
						<div class="col-3">
                            <div class="mb-3"> <!-- Resolucion -->
                                <label for="exampleInputEmail1" class="form-label">Resolución de la pantalla</label>
                                <input type="text" class="form-control" placeholder="1920x1080" name="resolucion" required>
                            </div>
                        </div>

						<h5>Almacenamiento</h5>
						<div class="col-4">
                            <div class="mb-3"> <!-- tipodiscoduro -->
                                <label for="exampleInputEmail1" class="form-label">Tipo de disco duro</label>
                                <input type="text" class="form-control" placeholder="HDD, SSD, etc." name="tipodiscoduro">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3"> <!-- Memoria interna -->
                                <label for="exampleInputEmail1" class="form-label">Tamaño disco duro</label>
								<div class="input-group mb-3">
                                    <input type="number" min="1" step="any" class="form-control" placeholder="00" name="tamañodiscoduro" required>
                                    <span class="input-group-text" id="basic-addon2">GB</span>
                                </div>
                                <!-- <input type="text" class="form-control" placeholder="32 GB, 64 GB, 128 GB, etc." name="tamañodiscoduro"> -->
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3"> <!-- Memoria RAM -->
                                <label for="exampleInputEmail1" class="form-label">Memoria RAM</label>
								<div class="input-group mb-3">
                                    <input type="number" min="1" step="any" class="form-control" placeholder="00" name="tamañoram" required>
                                    <span class="input-group-text" id="basic-addon2">GB</span>
                                </div>
                                <!-- <input type="text" class="form-control" placeholder="4 GB, 8 GB, 16 GB, etc." name="tamañoram"> -->
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                            </div>
                        </div>

						<h5>Otros</h5>
                        <div class="col-4">
                            <div class="mb-3"> <!-- Sistema operativo -->
                                <label for="exampleInputEmail1" class="form-label">Sistema operativo</label>
                                <input type="text" class="form-control" placeholder="Windows 10 Home, Windows 10 Pro, etc." name="sistemaoperativo">
                            </div>
                        </div>
						<div class="col-4">
                            <div class="mb-3"> <!-- Procesador -->
                                <label for="exampleInputEmail1" class="form-label">Procesador</label>
                                <input type="text" class="form-control" placeholder="Intel core i7, Ryzen 7 5600, etc." name="procesador" required>
                            </div>
                        </div>
						<div class="col-4">
                            <div class="mb-3"> <!-- Numero de nucleos -->
                                <label for="exampleInputEmail1" class="form-label">Numero de nucleos</label>
								<div class="input-group mb-3">
                                    <input type="number" min="1" step="any" class="form-control" placeholder="00" name="numeroprocesadores">
                                    <!-- <span class="input-group-text" id="basic-addon2">GB</span> -->
                                </div>
                            </div>
                        </div>

						<h5>Imagenes</h5>
                        <div class="col-4">
                            <div class="mb-3"> <!-- Principal -->
								<label for="formFile" class="form-label">Caratula</label>
								<input class="form-control" type="file" id="formFile" name="imagen1" required>
							</div>
                        </div>
						<div class="col-4">
                            <div class="mb-3"> <!-- imagen2 -->
								<label for="formFile" class="form-label">Imagen 1</label>
								<input class="form-control" type="file" id="formFile" name="imagen2">
							</div>
                        </div>
						<div class="col-4">
                            <div class="mb-3"> <!-- imagen3 -->
								<label for="formFile" class="form-label">Imagen 2</label>
								<input class="form-control" type="file" id="formFile" name="imagen3">
							</div>
                        </div>

						<h5>Datos de venta</h5>
						<div class="col-3">
                            <div class="mb-3"> <!-- Stock -->
                                <label class="form-label">Stock</label>
                                <div class="input-group mb-3">
                                    <input type="number" min="1" step="any" class="form-control" placeholder="00" name="stockProducto" required>
                                    <span class="input-group-text" id="basic-addon2">Pzs.</span>
                                    <div id="PriceHelp" class="form-text">Productos disponibles para su venta.</div>
                                </div>
                            </div>
                        </div>
						<div class="col-1">
                            <div class="mb-3">  <!-- Color -->
                                <label for="exampleColorInput" class="form-label">Color</label>
                                <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#007580" title="Elije el color de tu producto" name="color">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3"> <!-- Precio -->
                                <label for="exampleInputEmail1" class="form-label">Precio de venta</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="number" min="1" step="any" onChange="nuevoPrecio()" id="precioProducto" class="form-control" placeholder="00.00" name="precio" required>
                                    <span class="input-group-text" id="basic-addon2">MXN</span>
                                    <div id="PriceHelp" class="form-text">Cobramos una comisión del 15%.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3"> <!-- Recibiras -->
                                <label for="exampleInputEmail1" class="form-label">Recibirás</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="number" min="1" class="form-control" id="gananciasProducto" placeholder="00.00" name="gananciasProducto" disabled>
                                    <span class="input-group-text" id="basic-addon2">MXN</span>
                                    <!-- <div id="PriceHelp" class="form-text">Cobramos una comisión del 15%.</div> -->
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-12"> -->
                            <!-- <div class="mb-3"> Descripción -->
                                <!-- <label for="exampleInputEmail1" class="form-label">Una breve descrición del producto</label> -->
                                <!-- <input type="t" min="1" class="form-control" placeholder="Cantidad disponible" name="stockProducto"> -->
                                <!-- <textarea name="name" rows="2" class="form-control" placeholder="Escribre aquí una breve descrición de tu producto y trata de dar los detalles más relevantes de el mismo." required></textarea>                             -->
                            <!-- </div>                        -->
                        <!-- </div>                            -->

                    </div>

                    <button type="submit" class="btn btn-success" name='publicar'>Publicar producto</button>
                </form>
            </div>
            <!-- = = = = = = = = = = = = = = = = = = = = = = = = = = -->

            <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                    FORM 2.
					Estamos trabajando en esta parte :c
                </div>
            </div>

        </div>
    </div>


    <?php
        require '../assets/navs/footer.php';
	 ?>
</body>

</html>
