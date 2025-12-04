
<!-- EDITAR USUARIO -->
<div class="modal" id="modalEditUsuario">
    <div class="modal-content">
        <h2>Editar Usuario</h2>
        <form id="formEditUsuario">
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Ingresar Nombre(s)" required>

            <label>Apellido Paterno:</label>
            <input type="text" name="Apaterno" placeholder="Ingresar Apellido" required>

            <label>Apellido Materno:</label>
            <input type="text" name="Amaterno" placeholder="Ingresar Apellido" required>

            <label>Correo institucional:</label>
            <input type="email" name="correo" placeholder="Correo institucional" required>

            <label>Contraseña:</label>
            <input type="password" name="password" placeholder="Contraseña">

            <label>Teléfono:</label>
            <input type="tel" name="telefono" placeholder="Ingresar número de teléfono" required>

            <label>Estado:</label>
            <select name="estado" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>

            <label>Rol:</label>
            <select name="ID_rol" required>
                <option value="1">Administrador</option>
                <option value="2">Vendedor</option>
                <option value="3">Cliente</option>
            </select>

            <button type="submit" class="btn-azul">Guardar cambios</button>
            <button type="button" class="btn-gris" onclick="closeModal('modalEditUsuario')">Cancelar</button>
        </form>
    </div>
</div>
