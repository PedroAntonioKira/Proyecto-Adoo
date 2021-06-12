



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

let vNombre = false; 
let vApellidoP = false;
let vApellidoM = false;
let vCorreo = false;
let vCorreo2 = false;
let vPassword = false;
let vPassword2 = false;
let vTelefono = false;

const validarFormulario = (e) => {
	switch (e.target.name){
		case "nombres":

			validarCampo(expresiones.nombre,e.target, 'nombres');
		break;

		case "apellidoPat":
			validarCampo(expresiones.apellido,e.target, 'apellidoP');
		break;

		case "apellidoMat":
			validarCampo(expresiones.apellido,e.target, 'apellidoM');
		break;

		case "telefono":
			validarCampo(expresiones.telefono,e.target, 'telefono');
		break;

		case "correo":
			validarCampo(expresiones.correo,e.target, 'correo');
			validarIgualdad02();
		break;

		case "correo2":
			validarIgualdad02();
		break;

		case "password":
			validarCampo(expresiones.password,e.target, 'password');
			validarIgualdad();
		break;

		case "password2":
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
			case "nombres":
				vNombre = true;
			break;

			case "apellidoP":
				vApellidoP = true;
			break;

			case "apellidoM":
				vApellidoM = true;
			break;

			case "correo":
				vCorreo = true;
			break;

			case "password":
				vPassword = true;
			break;

			case "telefono":
				vTelefono = true;
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
			case "nombres":
				vNombre = false;
			break;

			case "apellidoP":
				vApellidoP = false;
			break;

			case "apellidoM":
				vApellidoM = false;
			break;

			case "correo":
				vCorreo = false;
			break;

			case "password":
				vPassword = false;
			break;

			case "telefono":
				vTelefono = false;
			break;
		}
	}
};


const validarIgualdad = () => {

	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('repetir-password');

	if (inputPassword1.value !== inputPassword2.value) {
		document.getElementById(`grupo__repetir-password`).classList.remove("formulario__grupo-correcto");
		document.getElementById(`grupo__repetir-password`).classList.add("formulario__grupo-incorrecto");
		document.querySelector(`#grupo__repetir-password i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__repetir-password i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__repetir-password .formulario__input-error`).classList.add('formulario__input-error-activo');
		//campos['repetir-password']= false;

		vPassword2 = false;
	}else{
		document.getElementById(`grupo__repetir-password`).classList.remove("formulario__grupo-incorrecto");
		document.getElementById(`grupo__repetir-password`).classList.add("formulario__grupo-correcto");
		document.querySelector(`#grupo__repetir-password i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__repetir-password i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__repetir-password .formulario__input-error`).classList.remove('formulario__input-error-activo');
		//campos['repetir-password']= true;

		vPassword2 = true;
	}

};


const validarIgualdad02 = () => {

	const inputCorreo1 = document.getElementById('correo');
	const inputCorreo2 = document.getElementById('repetir-correo');

	if (inputCorreo1.value !== inputCorreo2.value) {
		document.getElementById(`grupo__repetir-correo`).classList.remove("formulario__grupo-correcto");
		document.getElementById(`grupo__repetir-correo`).classList.add("formulario__grupo-incorrecto");
		document.querySelector(`#grupo__repetir-correo i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__repetir-correo i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__repetir-correo .formulario__input-error`).classList.add('formulario__input-error-activo');
		//campos['repetir-correo']= false;
		vCorreo2 = false;
	}else{
		document.getElementById(`grupo__repetir-correo`).classList.remove("formulario__grupo-incorrecto");
		document.getElementById(`grupo__repetir-correo`).classList.add("formulario__grupo-correcto");
		document.querySelector(`#grupo__repetir-correo i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__repetir-correo i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__repetir-correo .formulario__input-error`).classList.remove('formulario__input-error-activo');
		//campos['repetir-correo']= false;

		vCorreo2 = true;
	}

};



inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	
	if( vNombre && vApellidoP && vApellidoM && vCorreo && vCorreo2 && vPassword && vPassword2 && vTelefono && terminos.checked){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});

	}
	

});



