
<!-- EDITAR TIENDA -->
<div class="modal" id="modalEditTienda">
    <div class="modal-content">
        <h2>Editar Tienda</h2>
        <form id="formEditTienda" enctype="multipart/form-data">
            <label>Nombre de la Tienda:</label>
            <input type="text" name="nombre" required>
            <label>Descripción:</label>
            <textarea name="descripcion" style="width:100%; height:80px;"></textarea>
            <label>Redes Sociales:</label>
            <input type="text" name="redes">
            <label>Estado:</label>
            <select name="estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            <label>Horario:</label>
            <select name="ID_horario" id="horarioEditSelect"></select>
            <label>Método de Pago:</label>
            <select name="ID_metodo_pago" id="metodoPagoEditSelect"></select>
            <label>Vendedor:</label>
            <select name="ID_usuario_vendedor" id="vendedorEditSelect"></select>
            <label>Logo (opcional):</label>
            <input type="file" name="logo" accept="image/*">
            <button type="submit" class="btn-azul">Actualizar Tienda</button>
            <button type="button" class="btn-gris" onclick="closeModal('modalEditTienda')">Cancelar</button>
        </form>
    </div>
</div>
