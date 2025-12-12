// ============================================================
// MODALES GLOBALES
// ============================================================
function openModal(id){
    const modal = document.getElementById(id);
    if(modal) modal.classList.add("show");
}

function closeModal(id){
    const modal = document.getElementById(id);
    if(modal) modal.classList.remove("show");
}

window.openModal = openModal;
window.closeModal = closeModal;

// ============================================================
// MAIN
// ============================================================
document.addEventListener("DOMContentLoaded", function(){

    // ============================================================
    // ===================== SECCIÓN USUARIOS ======================
    // ============================================================
    function mostrarSeccionUsuarios(){
        const cont = document.getElementById("contenido-dinamico");
        cont.innerHTML = `
            <h3 class='titulo-seccion'>Tabla de Usuarios</h3>
            <p class='texto-seccion'>Aquí se mostrarán todos los usuarios registrados</p>

            <div class="acciones-panel">
                <button class="btn-azul" onclick="openModal('modalAddUsuario')">+ Agregar Usuario</button>
            </div>

            <div class="tabla-contenedor">
                <table class="tabla-admin">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usuarios-tbody"></tbody>
                </table>
            </div>
        `;
        cargarUsuarios();
        agregarListenerFormUsuario();
    }

    function cargarUsuarios(){
        fetch(rutasUsuarios.mostrar)
            .then(res => res.json())
            .then(data => {
                const tbody = document.getElementById("usuarios-tbody");
                tbody.innerHTML = "";
                data.forEach(u => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${u.ID_usuario}</td>
                            <td>${u.nombre}</td>
                            <td>${u.Apaterno}</td>
                            <td>${u.Amaterno}</td>
                            <td>${u.correo}</td>
                            <td>${u.telefono}</td>
                            <td>${u.estado}</td>
                            <td>${u.ID_rol}</td>
                            <td>
                                <button class="btn-tabla editar" onclick="editarUsuario(${u.ID_usuario})">Editar</button>
                                <button class="btn-tabla eliminar" onclick="eliminarUsuario(${u.ID_usuario})">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
            });
    }

    function agregarListenerFormUsuario(){
        const formAddUser = document.getElementById("formAddUsuario");
        if(formAddUser){
            formAddUser.addEventListener("submit", function(e){
                e.preventDefault();
                let formData = new FormData(formAddUser);
                fetch(rutasUsuarios.registrar, {
                    method: "POST",
                    headers: {'X-CSRF-TOKEN': csrf},
                    body: formData
                })
                .then(res => res.json())
                .then(resp => {
                    if(resp.success){
                        closeModal('modalAddUsuario');
                        cargarUsuarios();
                        formAddUser.reset();
                    } else alert("Error al registrar usuario");
                });
            });
        }
    }

    window.editarUsuario = function(id){
        fetch(rutasUsuarios.mostrar)
            .then(res => res.json())
            .then(data => {
                const u = data.find(x => x.ID_usuario == id);
                const form = document.getElementById("formEditUsuario");

                form.nombre.value = u.nombre;
                form.Apaterno.value = u.Apaterno;
                form.Amaterno.value = u.Amaterno;
                form.correo.value = u.correo;
                form.telefono.value = u.telefono;
                form.estado.value = u.estado;
                form.ID_rol.value = u.ID_rol;

                form.onsubmit = function(e){
                    e.preventDefault();
                    let formData = new FormData(form);
                    if(form.password.value) formData.append("password", form.password.value);

                    fetch(rutasUsuarios.actualizar + id, {
                        method: "POST",
                        headers: {'X-CSRF-TOKEN': csrf},
                        body: formData
                    })
                    .then(res => res.json())
                    .then(resp => {
                        if(resp.success){
                            closeModal('modalEditUsuario');
                            cargarUsuarios();
                        } else alert("Error al actualizar usuario");
                    });
                };

                openModal('modalEditUsuario');
            });
    }

    window.eliminarUsuario = function(id){
        if(id === 1){
            alert("No se puede eliminar al administrador principal.");
            return;
        }

        if(confirm("¿Deseas eliminar este usuario?")){
            fetch(rutasUsuarios.eliminar + id, {
                method: "DELETE",
                headers: {'X-CSRF-TOKEN': csrf}
            })
            .then(res => res.json())
            .then(resp => {
                if(resp.success) cargarUsuarios();
                else alert("Error al eliminar usuario");
            });
        }
    }

    // ============================================================
    // ===================== SECCIÓN TIENDAS ======================
    // ============================================================

// ============================================================
// ===================== SECCIÓN TIENDAS ======================
// ============================================================

let vendedoresCache = {}; // <-- Guardar nombres de vendedores

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

    cargarSelectsTiendas(); // llenado inicial de selects
    agregarListenerFormTienda();
}

// ============================================================
// Función para cargar select de vendedores usando cache
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

// ============================================================
// Cargar tabla de tiendas
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

// ============================================================
// Cargar selects de métodos de pago y vendedores
function cargarSelectsTiendas(){
    const metodos = ["metodoPagoAddSelect","metodoPagoEditSelect"];
    
    // Métodos de pago
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

    // Vendedores desde BD
    fetch(rutasTiendas.obtenerVendedores)
        .then(res => res.json())
        .then(data => {
            data.forEach(v => { vendedoresCache[v.ID_usuario] = v.nombre; });
            cargarSelectVendedores("vendedorAddSelect");
        });
}

// ============================================================
// Listener del formulario de agregar tienda
function agregarListenerFormTienda(){
    const form = document.getElementById("formAddTienda");
    if(!form) return;

    form.addEventListener("submit", function(e){
        e.preventDefault();

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
    });
}

// ============================================================
// Editar tienda
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

            // cargar select de vendedores usando cache y seleccionar actual
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

// ============================================================
// Eliminar tienda
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


});
