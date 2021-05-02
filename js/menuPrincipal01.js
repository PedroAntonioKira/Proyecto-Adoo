const btnCategorias = document.getElementById("boton_categorias");

const grid = document.getElementById("grid");

const menuNavegacion = document.querySelector('#menu_Navegacion .opciones_menu');

const categorias = document.querySelector('#boton_categorias');

const regresarMenuNavegacion = document.querySelector('#regresar01');

const cerrarMenu = document.querySelector('#btn_menu_cerrar');

const ocultarBarras = document.querySelector('#btn_menu_barras');





const regresarCategorias01 = document.querySelector('#regresar02');

const regresarCategorias02 = document.querySelector('#regresar03');

const regresarCategorias03 = document.querySelector('#regresar04');

const regresarCategorias04 = document.querySelector('#regresar05');

const regresarCategorias05 = document.querySelector('#regresar06');

const contenedorSubcategorias = document.getElementById("contenedor-Subcategorias");

const esDispositivoMovil = () => {
	if(window.innerWidth <= 1200){
		return true;
	} else{
		return false;
	}
};

btnCategorias.addEventListener('mouseover', () => {

	if (!esDispositivoMovil()) {
		grid.classList.add('activo');
	}
	

});

grid.addEventListener('mouseleave', () =>{

	if (!esDispositivoMovil()) {
		grid.classList.remove('activo');
	}

});




document.querySelectorAll('#menu_Navegacion .categorias a').forEach((elemento) => {

	//console.log(elemento);

	elemento.addEventListener('mouseenter', (e) => {

		if(!esDispositivoMovil()){
			
			//console.log(e.target.dataset.categoria);

			document.querySelectorAll('#menu_Navegacion .subcategorias').forEach((categoria) =>{

				//console.log(categoria.dataset.categoria);	

				categoria.classList.remove('activo');

				if (categoria.dataset.categoria == e.target.dataset.categoria) {

					categoria.classList.add('activo');
				}

			});
		}

		

	});

});



/*
*

* Dispositivo Movil

*
*/



document.querySelector('#btn_menu_barras').addEventListener('click', (evento) => {
	
	evento.preventDefault();

	//console.log(evento.target);

	if(menuNavegacion.classList.contains('activo')){

		document.querySelector('#menu_Navegacion .opciones_menu').classList.remove('activo');

		document.querySelector('body').style.overflow = 'visible';

		cerrarMenu.classList.remove('activo');

	}else{

		document.querySelector('#menu_Navegacion .opciones_menu').classList.add('activo');

		document.querySelector('body').style.overflow = 'hidden';

		cerrarMenu.classList.remove('activo');

	}

	//document.querySelector('#menu_Navegacion .opciones_menu').classList.add('activo');
});



/*
*

* Desplegando Categorias
*
*/


categorias.addEventListener('click',(evento02) => {

	evento02.preventDefault();

	grid.classList.add('activo');

	cerrarMenu.classList.add('activo');

	ocultarBarras.classList.add('activo');

});

regresarMenuNavegacion.addEventListener('click',(evento03) => {

	evento03.preventDefault();

	grid.classList.remove('activo');

	cerrarMenu.classList.remove('activo');

	ocultarBarras.classList.remove('activo');

});


document.querySelectorAll('#menu_Navegacion .categorias a').forEach((elemento02) => {

	elemento02.addEventListener('click', (evento04) => {

		//console.log(evento04.target);

		if (esDispositivoMovil()) {

			contenedorSubcategorias.classList.add('activo');

			document.querySelectorAll('#menu_Navegacion .subcategorias').forEach((categoria) => {

				categoria.classList.remove('activo');

				if(categoria.dataset.categoria == evento04.target.dataset.categoria){

					categoria.classList.add('activo');

				}

			});

		}	

	});

});





regresarCategorias01.addEventListener('click',(evento05) => {

	evento05.preventDefault();

	grid.classList.add('activo');

	contenedorSubcategorias.classList.remove('activo');

});

regresarCategorias02.addEventListener('click',(evento06) => {

	evento06.preventDefault();

	grid.classList.add('activo');

	contenedorSubcategorias.classList.remove('activo');

});

regresarCategorias03.addEventListener('click',(evento07) => {

	evento07.preventDefault();

	grid.classList.add('activo');

	contenedorSubcategorias.classList.remove('activo');

});

regresarCategorias04.addEventListener('click',(evento08) => {

	evento08.preventDefault();

	grid.classList.add('activo');

	contenedorSubcategorias.classList.remove('activo');

});

regresarCategorias05.addEventListener('click',(evento09) => {

	evento09.preventDefault();

	grid.classList.add('activo');

	contenedorSubcategorias.classList.remove('activo');

});


cerrarMenu.addEventListener('click',(evento03) => {

	evento03.preventDefault();

	grid.classList.remove('activo');

	cerrarMenu.classList.remove('activo');

	ocultarBarras.classList.remove('activo');

	document.querySelector('body').style.overflow = 'visible';

	document.querySelector('#menu_Navegacion .opciones_menu').classList.remove('activo');

});