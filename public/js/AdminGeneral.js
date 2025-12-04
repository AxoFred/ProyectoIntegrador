// =========================
// MODALES GLOBALES
// =========================
function openModal(id){
    const modal = document.getElementById(id);
    if(modal) modal.classList.add("show");
}

function closeModal(id){
    const modal = document.getElementById(id);
    if(modal) modal.classList.remove("show");
}

// Exponer globalmente
window.openModal = openModal;
window.closeModal = closeModal;

// =========================
// MAIN
// =========================
document.addEventListener("DOMContentLoaded", function(){

    // =========================
    // MOSTRAR SECCIÓN USUARIOS
    // =========================
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

    // =========================
    // CARGAR USUARIOS
    // =========================
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

    // =========================
    // AGREGAR LISTENER FORM USUARIO
    // =========================
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

    // =========================
    // EDITAR USUARIO
    // =========================
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

 // =========================
// ELIMINAR USUARIO
// =========================
window.eliminarUsuario = function(id){
    if(id === 1){  // Si el ID es 1, que no haga nada
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

    // =========================
    // MOSTRAR SECCIÓN TIENDAS
    // =========================
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
                            <th>Horario</th>
                            <th>Método Pago</th>
                            <th>Vendedor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tiendas-tbody"></tbody>
                </table>
            </div>
        `;
        cargarTiendas();
        cargarSelectsTiendas();
    }

    // =========================
    // CARGAR TIENDAS
    // =========================
    function cargarTiendas(){
        fetch(rutasTiendas.mostrar)
            .then(res => res.json())
            .then(data => {
                const tbody = document.getElementById("tiendas-tbody");
                tbody.innerHTML = "";
                data.forEach(t => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${t.ID_tienda}</td>
                            <td>${t.nombre}</td>
                            <td>${t.descripcion}</td>
                            <td>${t.redes}</td>
                            <td>${t.logo ? `<img src="storage/${t.logo}" width="50">` : ''}</td>
                            <td>${t.estado}</td>
                            <td>${t.ID_horario}</td>
                            <td>${t.ID_metodo_pago}</td>
                            <td>${t.ID_usuario_vendedor}</td>
                            <td>
                                <button class="btn-tabla editar" onclick="editarTienda(${t.ID_tienda})">Editar</button>
                                <button class="btn-tabla eliminar" onclick="eliminarTienda(${t.ID_tienda})">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
            });
    }

    // =========================
    // CARGAR SELECTS TIENDAS
    // =========================
    function cargarSelectsTiendas(){
        const selectsHorarios = ["horarioAddSelect","horarioEditSelect"];
        const selectsMetodos = ["metodoPagoAddSelect","metodoPagoEditSelect"];
        const selectsVendedores = ["vendedorAddSelect","vendedorEditSelect"];

        fetch("/tiendas/obtener-horarios")
            .then(res => res.json())
            .then(data => {
                selectsHorarios.forEach(id => {
                    const select = document.getElementById(id);
                    if(select){
                        select.innerHTML = "";
                        data.forEach(h => select.innerHTML += `<option value="${h.ID_horario}">${h.descripcion}</option>`);
                    }
                });
            });

        fetch("/tiendas/obtener-metodos")
            .then(res => res.json())
            .then(data => {
                selectsMetodos.forEach(id => {
                    const select = document.getElementById(id);
                    if(select){
                        select.innerHTML = "";
                        data.forEach(m => select.innerHTML += `<option value="${m.ID_metodo_pago}">${m.nombre}</option>`);
                    }
                });
            });

        fetch("/tiendas/obtener-vendedores")
            .then(res => res.json())
            .then(data => {
                selectsVendedores.forEach(id => {
                    const select = document.getElementById(id);
                    if(select){
                        select.innerHTML = "";
                        data.forEach(v => select.innerHTML += `<option value="${v.ID_usuario}">${v.nombre}</option>`);
                    }
                });
            });
    }

    // =========================
    // AGREGAR TIENDA
    // =========================
    function agregarListenerFormTienda() {
        const formAddTienda = document.getElementById("formAddTienda");
        if (formAddTienda) {
            formAddTienda.addEventListener("submit", function (e) {
                e.preventDefault();

                // Validar que todos los campos requeridos tengan valor
                if (!formAddTienda.nombre.value.trim()) { alert("Ingresa el nombre de la tienda"); return; }
                if (!formAddTienda.descripcion.value.trim()) { alert("Ingresa la descripción"); return; }

                let formData = new FormData(formAddTienda);

                // Enviar POST a Laravel
                fetch(rutasTiendas.registrar, {
                    method: "POST",
                    headers: { 'X-CSRF-TOKEN': csrf },  // Laravel espera CSRF
                    body: formData
                })
                .then(res => res.json())
                .then(resp => {
                    if (resp.success) {
                        closeModal('modalAddTienda');
                        cargarTiendas();  // recarga tabla
                        formAddTienda.reset();
                    } else {
                        alert(resp.message || "Error al registrar tienda");
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Error en la conexión al registrar tienda");
                });
            });
        }
    }

    // Llamar función después de cargar DOM
    agregarListenerFormTienda();


    // =========================
    // EDITAR TIENDA
    // =========================
    window.editarTienda = function(id){
        fetch(rutasTiendas.mostrar)
            .then(res => res.json())
            .then(data => {
                const t = data.find(x => x.ID_tienda == id);
                const form = document.getElementById("formEditTienda");

                form.nombre.value = t.nombre;
                form.descripcion.value = t.descripcion;
                form.redes.value = t.redes;
                form.estado.value = t.estado;
                form.ID_horario.value = t.ID_horario;
                form.ID_metodo_pago.value = t.ID_metodo_pago;
                form.ID_usuario_vendedor.value = t.ID_usuario_vendedor;

                form.onsubmit = function(e){
                    e.preventDefault();
                    let formData = new FormData(form);
                    if(form.logo.files.length > 0) formData.append("logo", form.logo.files[0]);
                    fetch(rutasTiendas.actualizar + id, {
                        method: "POST",
                        headers: {'X-CSRF-TOKEN': csrf},
                        body: formData
                    }).then(res => res.json())
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

    // ========================= 
    // ELIMINAR TIENDA 
    // // ========================= 
    window.eliminarTienda = function(id){
         if(confirm("¿Deseas eliminar esta tienda?")){
             fetch(rutasTiendas.eliminar + id, 
                { method: "DELETE", headers: 
                    {'X-CSRF-TOKEN': csrf} }).then(res => res.json()) .then(resp => { if(resp.success) 
                        cargarTiendas(); else alert("Error al eliminar tienda"); }); } }
    // =========================
    // MOSTRAR SECCIONES
    // =========================
    function mostrarSeccion(seccion){
        const cont = document.getElementById("contenido-dinamico");
        cont.innerHTML = "<p>Cargando...</p>";

        switch(seccion.toLowerCase()){
            case "usuarios":
                if(typeof mostrarSeccionUsuarios === "function") mostrarSeccionUsuarios();
                break;
            case "tiendas":
                if(typeof mostrarSeccionTiendas === "function") mostrarSeccionTiendas();
                break;
            default:
                cont.innerHTML = "<p>Sección no disponible.</p>";
        }
    }

    window.mostrarSeccion = mostrarSeccion;

});
