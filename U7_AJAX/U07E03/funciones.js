function recogida() {
    var xhttp = new XMLHttpRequest();
    var fecha = document.getElementById("f_nacimiento").value;
    var codigo = document.getElementById("cod").value;
    var telefono = document.getElementById("tlfn").value;

    var url = "procesadatos.php?fecha=" + fecha + "&cod=" + codigo + "&tlfn=" + telefono;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.response);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.setRequestHeader("Content-type", "aplicarion/x-www-form-urlencoded");
    xhttp.send(url);
    return false;
}