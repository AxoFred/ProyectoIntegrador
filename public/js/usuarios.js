document.addEventListener("DOMContentLoaded", function(){

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
// SECCIÓN USUARIOS
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

// ESTA LÍNEA FALTABA
window.mostrarSeccionUsuarios = mostrarSeccionUsuarios;

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

// ESTA LÍNEA ES LA QUE FALTABA
window.mostrarSeccionUsuarios = mostrarSeccionUsuarios;

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
    console.log("RESPUESTA DEL SERVIDOR:", resp);

    if(resp.success == true || resp.success == "1" || resp.success == 1){
        closeModal('modalAddUsuario');
        cargarUsuarios();
        formAddUser.reset();
    } else {
        alert("Error al registrar usuario: " + (resp.message || resp.error || "Respuesta inválida"));
    }
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

}); // cierre DOMContentLoaded
