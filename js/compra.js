console.log ("Soy compra");

$(document).ready(function(){
    $('#select-date').on('change', function(){
        contenido = document.getElementById('select-date').value;
        proximoDia = contenido.split(',');
        cortar = proximoDia[3].split(' ');
        valor = cortar[1];
        console.log(valor);
        valor =  valor.toLowerCase();
        if(valor == "-1"){
            console.log("error");
            inputFecha = document.getElementById("input-fecha");
            inputFecha.value = "";
        }
        else{
            switch(valor){
                case "lunes":
                    valor = 1;
                    break;
                case "martes":
                    valor = 2;
                    break;     
                case "miercoles":
                    valor = 3;
                    break;
                case "jueves":
                    valor = 4;
                    break;
                case "viernes":
                    valor = 5;
                    break;
                case "sabado":
                    valor = 6;
                    break;
                case "domingo":
                    valor = 0;
                    break;  
                default:
                    valor = 0;
                    break;                                                                                         
            }
            console.log(valor);
            fecha = obtnerProximoDia(valor);
    
            inputFecha = document.getElementById("input-fecha");
            inputFechaFinal = document.getElementById("input-fecha-final");
            inputFecha.value = fecha;
            inputFechaFinal.value = fecha;
        }

    });
});

function obtnerProximoDia(dia_buscado){
    let hoy = new Date();
    let DIA_EN_MILISEGUNDOS = 24 * 60 * 60 * 1000;
    while(hoy.getDay() != dia_buscado){
    // if(){
        hoy = new Date(hoy.getTime() + DIA_EN_MILISEGUNDOS);
    }
    fecha = hoy.getFullYear() + '-' + hoy.getMonth() + '-' + hoy.getDate();
    // console.log("Fecha encontrada: " + hoy.getDate() + '/' + hoy.getMonth() + '/' + hoy.getFullYear()); 
    return fecha;
}