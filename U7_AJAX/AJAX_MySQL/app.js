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
            workplace.innerHTML = `<h3>Introduce los datos del nuevo item:</h3>
                <label for="id-persona">ID Persona:</label>
                <input type="number" name="id-persona" id="id-persona" required>
                <label for="id-footwear">ID Footwear:</label>
                <input type="number" name="id-footwear" id="id-footwear" required>
                <label for="id-pants">ID Pants:</label>
                <input type="number" name="id-pants" id="id-pants" required>
                <label for="id-tshirt">ID T-shirts:</label>
                <input type="number" name="id-tshirt" id="id-tshirt" required>
                <button type="button" onclick="regOutfit()">Registrar Outfit</button>`;
            cargarTablas();
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

            let html = `<h3>ID - Brand - Color - Size - Price</h3><ul>`;
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    }
    xhttp.open("POST", './API/db_delFootwear.php', true)
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
    if ((campoSeleccionado === 'brand' || campoSeleccionado === 'color') && (valorEscrito.trim() === '')){
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
            console.log(JSON.parse(this.responseText))
            const data = JSON.parse(this.responseText);

            let html = `<h3>ID - Brand - Color - Size - Price</h3><ul>`;
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    };

    xhttp.open("POST", "./API/db_modFootwear.php", true);
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

            let html = `<h3>ID - Brand - Color - Size - Price</h3><ul>`;
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    }
    xhttp.open("POST", './API/db_inPants.php' , true)
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}

function cargarCamisetas() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);

            let html = `<h3>ID - Brand - Color - Size - Price</h3><ul>`;
            data.forEach(item => {
                html += `<li>${item.id} - ${item.brand} - ${item.color} - ${item.size} - ${item.price}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    }
    xhttp.open("GET", './API/db_load.php' , true)
    xhttp.send();
}

function regOutfit(){
    let idperson = document.getElementById('id-persona').value;
    let idfootwear = document.getElementById('id-footwear').value;
    let idpants = document.getElementById('id-pants').value;
    let idtshirt = document.getElementById('id-tshirt').value;
    let xhttp = new XMLHttpRequest();
    let params = `idPerson=${idperson}&idFootwear=${idfootwear}&idPants=${idpants}&idTshirt=${idtshirt}`;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);

            let html = `<h3>Outfit ID - Person ID - Footwear ID - Pants ID - T-Shirt ID</h3><ul>`;
            data.forEach(item => {
                html += `<li>${item.id} - ${item.person_id} - ${item.footwear_id} - ${item.pants_id} - ${item.tshirt_id}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;
        }
    }
    xhttp.open("POST", './API/db_regOutfit.php' , true)
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}
function cargarTablas(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);

            let html = "<h3>People</h3><ul>";
            data.people.forEach(p => {
                html += `<li>${p.id} - ${p.name}</li>`;
            });
            html += "</ul>";

            html += "<h3>Pants</h3><ul>";
            data.pants.forEach(p => {
                html += `<li>${p.id} - ${p.brand} - ${p.size}</li>`;
            });
            html += "</ul>";

            html += "<h3>Footwear</h3><ul>";
            data.footwear.forEach(p => {
                html += `<li>${p.id} - ${p.brand} - ${p.size}</li>`;
            });
            html += "</ul>";

            html += "<h3>T-shirts</h3><ul>";
            data.tshirts.forEach(p => {
                html += `<li>${p.id} - ${p.brand} - ${p.size}</li>`;
            });
            html += "</ul>";

            result.innerHTML = html;

        }
    }
    xhttp.open("GET", './API/db_mostrarTablas.php' , true)
    xhttp.send();
}