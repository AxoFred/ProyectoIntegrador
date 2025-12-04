
<!-- AGREGAR TIENDA -->
<div class="modal" id="modalAddTienda">
    <div class="modal-content">
        <h2>Registrar Nueva Tienda</h2>
        <form id="formAddTienda" enctype="multipart/form-data">
            <label>Nombre de la Tienda:</label>
            <input type="text" name="nombre" required>
            <label>Descripción:</label>
            <textarea name="descripcion" style="width:100%; height:80px; background-color: rgb(19, 18, 19); color: white;"></textarea>
            <label>Redes Sociales:</label>
            <input type="text" name="redes">
            <label>Estado:</label>
            <select name="estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            <label>Horario:</label>
            <select name="ID_horario" id="horarioAddSelect"></select>
                <option value="mañana">Activo</option>
                <option value="Inactivo">Inactivo</option>
            <label>Método de Pago:</label>
            <select name="ID_metodo_pago" id="metodoPagoAddSelect"></select>
            <label>Vendedor:</label>
            <select name="ID_usuario_vendedor" id="vendedorAddSelect"></select>
            <label>Logo:</label>
            <input type="file" name="logo" accept="image/*">
            <button type="submit" class="btn-azul">Registrar Tienda</button>
            <button type="button" class="btn-gris" onclick="closeModal('modalAddTienda')">Cancelar</button>
        </form>
    </div>
</div>
