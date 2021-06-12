const formulario = document.getElementById('formulario');

const inputs = document.querySelectorAll('#formulario input');



const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^([a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40})$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,20}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{10}$/, // {7,14}$ 7 a 14 numeros. 
	apellido: /^([a-zA-ZÀ-ÿ]{1,20}|[a-zA-ZÀ-ÿ]{1,10}\s[a-zA-ZÀ-ÿ]{1,10})$/, // Letras y espacios, pueden llevar acentos.
}

let vCorreo = false;
let vPassword = false;

const validarFormulario = (e) => {
	switch (e.target.name){
		case "correo":
			validarCampo(expresiones.correo,e.target, 'correo');
			validarIgualdad02();

		case "password":
			validarCampo(expresiones.password,e.target, 'password');
			validarIgualdad();
		break;
	}
};

const validarCampo = (expresion, input, campo) =>{
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove("formulario__grupo-incorrecto");
		document.getElementById(`grupo__${campo}`).classList.add("formulario__grupo-correcto");
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		//campos[campo]= true;
		switch(campo){

			case "correo":
				vCorreo = true;
			break;

			case "password":
				vPassword = true;
			break;
		}
	}else{
		document.getElementById(`grupo__${campo}`).classList.remove("formulario__grupo-correcto");
		document.getElementById(`grupo__${campo}`).classList.add("formulario__grupo-incorrecto");
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		//campos[campo]= false;

		switch(campo){

			case "correo":
				vCorreo = false;
			break;

			case "password":
				vPassword = false;
			break;

		}
	}
};



inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	
	if( vCorreo && vPassword ){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});

	}
	

});



