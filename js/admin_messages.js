function mostrarToast() {
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