document.addEventListener("DOMContentLoaded", function(){

// ============================================================
// SECCIÓN TIENDAS
// ============================================================
let vendedoresCache = {};

function mostrarSeccionTiendas(){
    const cont = document.getElementById("contenido-dinamico");
    cont.innerHTML = `
        <h3 class='titulo-seccion'>Administración de Tiendas</h3>
        <p class='texto-seccion'>Aquí se mostrarán todas las tiendas registradas</p>

        <div class="acciones-panel">
            <button class="btn-azul" onclick="openModal('modalAddTienda')">+ Agregar Tienda</button>
        </div>

        <div class="tabla-contenedor">
            <table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Redes</th>
                        <th>Logo</th>
                        <th>Estado</th>
                        <th>Método Pago</th>
                        <th>Vendedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tiendas-tbody"></tbody>
            </table>
        </div>
    `;

    cargarSelectsTiendas();
    cargarTiendas();              // ESTA LLAMADA FALTABA PARA MOSTRAR LAS TIENDAS
    agregarListenerFormTienda();
}

// ESTA LÍNEA FALTABA
window.mostrarSeccionTiendas = mostrarSeccionTiendas;

function cargarSelectVendedores(selectId, selectedValue = ""){
    const select = document.getElementById(selectId);
    if(!select) return;

    select.innerHTML = `<option value="">Selecciona un vendedor</option>`;
    for(const id in vendedoresCache){
        const option = document.createElement("option");
        option.value = id;
        option.textContent = vendedoresCache[id];
        if(id == selectedValue) option.selected = true;
        select.appendChild(option);
    }
}

function cargarTiendas(){
    const metodoPagoTexto = {1:"Efectivo",2:"Transferencia",3:"Efectivo y Transferencia"};

    fetch(rutasTiendas.mostrar)
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById("tiendas-tbody");
            tbody.innerHTML = "";

            data.forEach(t => {
                const logoHTML = t.logo ? `<img src="storage/logos/${t.logo}" width="50">` : '';
                const vendedorNombre = vendedoresCache[t.ID_usuario_vendedor] || t.ID_usuario_vendedor;

                tbody.innerHTML += `
                    <tr>
                        <td>${t.ID_tienda}</td>
                        <td>${t.nombre}</td>
                        <td>${t.descripcion}</td>
                        <td>${t.redes}</td>
                        <td>${logoHTML}</td>
                        <td>${t.estado}</td>
                        <td>${metodoPagoTexto[t.metodo_pago]}</td>
                        <td>${vendedorNombre}</td>
                        <td>
                            <button class="btn-tabla editar" onclick="editarTienda(${t.ID_tienda})">Editar</button>
                            <button class="btn-tabla eliminar" onclick="eliminarTienda(${t.ID_tienda})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function cargarSelectsTiendas(){
    const metodos = ["metodoPagoAddSelect","metodoPagoEditSelect"];

    metodos.forEach(id => {
        const select = document.getElementById(id);
        if(select){
            select.innerHTML = `
                <option value="1">Efectivo</option>
                <option value="2">Transferencia</option>
                <option value="3">Efectivo y Transferencia</option>
            `;
        }
    });

    fetch(rutasTiendas.obtenerVendedores)
        .then(res => res.json())
        .then(data => {
            data.forEach(v => { vendedoresCache[v.ID_usuario] = v.nombre; });
            cargarSelectVendedores("vendedorAddSelect");
        });
}

function agregarListenerFormTienda(){
    const form = document.getElementById("formAddTienda");
    if(!form) return;

    form.removeEventListener("submit", enviarFormTienda); // Limpia duplicados
    form.addEventListener("submit", enviarFormTienda);
}

function enviarFormTienda(e){
    e.preventDefault();

    const form = document.getElementById("formAddTienda");

    if(!form.ID_usuario_vendedor.value){
        alert("Debes seleccionar un vendedor.");
        return;
    }

    let formData = new FormData(form);

    fetch(rutasTiendas.registrar, {
        method: "POST",
        headers: { 'X-CSRF-TOKEN': csrf },
        body: formData
    })
    .then(res => res.json())
    .then(resp => {
        if(resp.success){
            closeModal("modalAddTienda");
            form.reset();
            cargarTiendas();
        } else alert(resp.error || "Error al registrar tienda");
    });
}


window.editarTienda = function(id){
    fetch(rutasTiendas.mostrar)
        .then(res => res.json())
        .then(data => {
            const t = data.find(x => x.ID_tienda == id);
            if(!t) return;

            const form = document.getElementById("formEditTienda");
            form.ID_tienda.value = t.ID_tienda;
            form.nombre.value = t.nombre;
            form.descripcion.value = t.descripcion;
            form.redes.value = t.redes;
            form.estado.value = t.estado;
            document.getElementById("metodoPagoEditSelect").value = t.metodo_pago;

            cargarSelectVendedores("vendedorEditSelect", t.ID_usuario_vendedor);

            form.onsubmit = function(e){
                e.preventDefault();
                let formData = new FormData(form);
                if(form.logo.files.length)
                    formData.append("logo", form.logo.files[0]);

                fetch(rutasTiendas.actualizar + id, {
                    method: "POST",
                    headers: {'X-CSRF-TOKEN': csrf},
                    body: formData
                })
                .then(res => res.json())
                .then(resp => {
                    if(resp.success){
                        closeModal('modalEditTienda');
                        cargarTiendas();
                    } else alert("Error al actualizar tienda");
                });
            };

            openModal('modalEditTienda');
        });
}

window.eliminarTienda = function(id){
    if(confirm("¿Deseas eliminar esta tienda?")){
        fetch(rutasTiendas.eliminar + id, {
            method: "DELETE",
            headers: {'X-CSRF-TOKEN': csrf}
        })
        .then(res => res.json())
        .then(resp => {
            if(resp.success) cargarTiendas();
            else alert("Error al eliminar tienda");
        });
    }
}

}); // cierre DOMContentLoaded
