let workplace = document.getElementById('DBworkplace');
let result = document.getElementById('DBresult')
function menu(){
    const value = document.getElementById('actionDB').value;
    switch (value) {
        case "ModFootwear":
            workplace.innerHTML = `<label for="id">ID del item:</label>
                <input type="number" name="id" id="id" required>
                
                <label for="campo">¿Qué campo desea modificar?</label>
                <select name="campo" id="campo">
                    <option value="size">Talla</option>
                    <option value="price">Precio</option>
                    <option value="brand">Marca</option>
                    <option value="color">Color</option>
                </select>
                
                <label for="nuevo_valor">Nuevo valor:</label>
                <input type="text" name="nuevo_valor" id="nuevo_valor">
                
                <button type="button" onclick="obtenerDatos()">Modificar</button>`;

            break;
        case "InPants":
            workplace.innerHTML = `<h3>Introduce los datos del nuevo item:</h3>
                <label for="size">Talla:</label>
                <input type="number" name="size" id="size" required>
                <label for="price">Precio:</label>
                <input type="number" name="price" id="price" required>
                <label for="brand">Marca:</label>
                <input type="text" name="brand" id="brand" required>
                <label for="color">Color:</label>
                <input type="text" name="color" id="color" required>
                <button type="button" onclick="introducir()">Introducir</button>`;

            break;
        case "Load":
            cargarCamisetas();

            break;
        case "RegOutfit":

            break;
        case "DelFootwear":
            workplace.innerHTML = `<label for="id">Introduce el ID del item que deseas borrar</label><br>
                <input type="number" name="id" id="id" required>
                <button onclick="borrar()">Borrar</button>`;
            break;
        default:

    }
}

// Funciones
function borrar() {
    let xhttp = new XMLHttpRequest();
    let id = document.getElementById('id').value;
    let params = `id=${id}`;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);

            let html = "<ul>";
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    }
    xhttp.open("POST", 'db_delFootwear.php', true)
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}

function obtenerDatos() {
    const id = document.getElementById('id').value;
    const select = document.getElementById('campo');
    const input = document.getElementById('nuevo_valor');

    const campoSeleccionado = select.value; // "size", "price", etc.
    const valorEscrito = input.value;       // Lo que el usuario tecleó

    if ((campoSeleccionado === 'size' || campoSeleccionado === 'price') && (valorEscrito === '' || Number.isNaN(Number(valorEscrito)))) {
        result.innerHTML = `<p><strong>El campo ${campoSeleccionado} debe ser un número.</strong></p>`;
        return
    }
    if ((campoSeleccionado === 'brand' || campoSeleccionado === 'color') && (valorEscrito.length === 0)){
        result.innerHTML = `<p><strong>El campo ${campoSeleccionado} debe ser una cadena de texto.</strong></p>`;
        return
    }
    modificar(id, campoSeleccionado, valorEscrito);
}

function modificar(id, campo, valor) {
    let xhttp = new XMLHttpRequest();
    let params = `id=${id}&campo=${campo}&valor=${encodeURIComponent(valor)}`;

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const data = JSON.parse(this.responseText);

            let html = "<ul>";
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    };

    xhttp.open("POST", "db_modFootwear.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}

function introducir(){
    let size = document.getElementById('size').value;
    let price = document.getElementById('price').value;
    let brand = document.getElementById('brand').value;
    let color = document.getElementById('color').value;
    let xhttp = new XMLHttpRequest();
    let params = `size=${size}&price=${price}&brand=${brand}&color=${color}`;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);

            let html = "<ul>";
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    }
    xhttp.open("POST", 'db_inPants.php' , true)
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}

function cargarCamisetas() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);

            let html = "<ul>";
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    }
    xhttp.open("GET", 'db_load.php' , true)
    xhttp.send();
}