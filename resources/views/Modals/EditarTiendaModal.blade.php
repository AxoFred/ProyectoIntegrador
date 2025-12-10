<div class="modal" id="modalEditTienda">
    <div class="modal-content">
        <h2>Editar Tienda</h2>
        <form id="formEditTienda" enctype="multipart/form-data">
            <input type="hidden" name="ID_tienda" id="ID_tienda">

            <label>Logo:</label>
            <input type="file" name="logo" accept="image/*">

            <label>Nombre de la Tienda:</label>
            <input type="text" name="nombre" required placeholder="Nombre de la tienda">

            <label>Descripción:</label>
            <textarea name="descripcion" style="width:100%; height:80px; background-color: rgb(19, 18, 19); color: white;" placeholder="Descripción"></textarea>

            <label>Redes Sociales:</label>
            <input type="text" name="redes" placeholder="Facebook, Instagram, etc.">

            <label>Estado:</label>
            <select name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>

            <label>Método de Pago:</label>
            <select name="metodo_pago" id="metodoPagoEditSelect"></select>

            <label>Vendedor:</label>
            <select name="ID_usuario_vendedor" id="vendedorEditSelect">
                <option value="">Selecciona un vendedor</option>
            </select>

            <button type="submit" class="btn-azul">Actualizar Tienda</button>
            <button type="button" class="btn-gris" onclick="closeModal('modalEditTienda')">Cancelar</button>
        </form>
    </div>
</div>