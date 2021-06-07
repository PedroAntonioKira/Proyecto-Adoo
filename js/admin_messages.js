function mostrarToast(title, message) {
    // TITULO
    var toast_title = document.getElementById("toast-title");
    toast_title.innerHTML = title;
    // MENSAJE
    var toast_message = document.getElementById("toast-message");
    toast_message.innerHTML = message;
    // MOSTRAR TOAST
    var toast = document.getElementById("liveToast");
    toast.className = "show";
    console.log("Abrir Toast :)");
    setTimeout(function(){ toast.className = toast.className.replace("show", "toast hide"); }, 5000);
}
function cerrarToast() {
    var toast = document.getElementById("liveToast");
    toast.className = "toast hide";
    // toast.className = toast.className.replace("show", "toast hide");
    console.log("Cerrar Toast :)");
}