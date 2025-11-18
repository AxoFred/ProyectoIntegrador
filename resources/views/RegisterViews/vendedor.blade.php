<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Vendedores</title>
    <link rel="stylesheet" href="../css/vendedor.css">
</head>
<body class="overlay img">
        
    <!-- Encabezado -->
  <header class="header">
    <div class="logo"><h1>SABORYTEC</h1></div>

    <nav class="nav">
      <a href="{{ url('/inicio') }}">Inicio</a>
      <a href="{{ url('/explorar') }}">Explorar</a>
      <a href="{{ url('/carrito') }}">carrito</a>
      <a href="{{ url('/pedidos') }}">Pedidos</a>
      <a href="{{ url('/vendedor') }}">Vendedor</a>
      <a href="{{ url('/administrador') }}">Administrador</a>
    </nav>

    <!-- AGREGADO: Contenedor para agrupar los botones a la derecha -->
    <div class="header-buttons">
        <button class="login-btn" onclick="window.location.href='{{ url('/perfil') }}'">Mi perfil</button>
        <button class="login-btn" onclick="window.location.href='{{ url('/') }}'">Cerrar Sesion</button>
    </div>

  </header>

<main class="container">

    <h1 class="titulo">Panel de Vendedor</h1>

    <div class="acciones-panel">
        <button class="btn-azul" onclick="openModal('modalAgregar')">➕ Agregar Producto</button>
        <button class="btn-azul" onclick="openModal('modalPedidos')">🧾 Ver Pedidos</button>
        <button class="btn-azul" onclick="openModal('modalHorario')">🕒 Publicar/Editar Horario</button>
    </div>

    <div class="tabla-contenedor">
        <table class="tabla-vendedores">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Stock</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><img src="../Assets/img/coctel de frutas.jpg" class="img-producto"></td>
                    <td>001</td>
                    <td>Malteada Oreo</td>
                    <td>Malteada con galleta Oreo</td>
                    <td>$35.00</td>
                    <td>Activo</td>
                    <td>20</td>
                    <td>Oreo</td>
                    <td>Bebidas</td>
                    <td>
                        <button class="btn-tabla editar" onclick="openModal('modalEditar')">Editar</button>
                        <button class="btn-tabla eliminar">Eliminar</button>
                    </td>
                </tr>

                <tr>
                    <td><img src="../Assets/img/boing.jpg" class="img-producto"></td>
                    <td>002</td>
                    <td>Torta de Jamón</td>
                    <td>Torta con jamón y queso</td>
                    <td>$28.00</td>
                    <td>Activo</td>
                    <td>15</td>
                    <td>Bimbo</td>
                    <td>Comida</td>
                    <td>
                        <button class="btn-tabla editar" onclick="openModal('modalEditar')">Editar</button>
                        <button class="btn-tabla eliminar">Eliminar</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</main>

    <!-- ================= MODAL AGREGAR PRODUCTO ================= -->
    <div class="modal" id="modalAgregar">
        <div class="modal-content">
            <h2>Agregar Producto</h2>

            <form>
                <label>Imagen del producto:</label>
                <input type="file" accept="image/*">

                <label>ID:</label>
                <input type="text">

                <label>Nombre:</label>
                <input type="text">

                <label>Descripción:</label>
                <textarea></textarea>

                <label>Precio:</label>
                <input type="number">

                <label>Estado:</label>
                <select>
                    <option>Activo</option>
                    <option>Inactivo</option>
                </select>

                <label>Stock:</label>
                <input type="number">

                <label>Marca:</label>
                <input type="text">

                <label>Categoría:</label>
                <input type="text">

                <button type="submit" class="btn-azul">Guardar</button>
                <button type="button" class="btn-gris" onclick="closeModal('modalAgregar')">Cerrar</button>
            </form>
        </div>
    </div>

    <!-- ================= MODAL EDITAR PRODUCTO ================= -->
    <div class="modal" id="modalEditar">
        <div class="modal-content">
            <h2>Editar Producto</h2>

            <form>
                <label>Imagen del producto:</label>
                <input type="file" accept="image/*">

                <label>ID:</label>
                <input type="text" value="001">

                <label>Nombre:</label>
                <input type="text" value="Malteada Oreo">

                <label>Descripción:</label>
                <textarea>Malteada con galleta Oreo</textarea>

                <label>Precio:</label>
                <input type="number" value="35">

                <label>Estado:</label>
                <select>
                    <option>Activo</option>
                    <option>Inactivo</option>
                </select>

                <label>Stock:</label>
                <input type="number" value="20">

                <label>Marca:</label>
                <input type="text" value="Oreo">

                <label>Categoría:</label>
                <input type="text" value="Bebidas">

                <button type="submit" class="btn-azul">Guardar Cambios</button>
                <button type="button" class="btn-gris" onclick="closeModal('modalEditar')">Cerrar</button>
            </form>
        </div>
    </div>

    <!-- ================= MODAL VER PEDIDOS ================= -->
    <div class="modal" id="modalPedidos">
        <div class="modal-content">
            <h2>Pedidos del Día</h2>

            <div class="lista-pedidos">
                <p><b>Pedido #034:</b> Torta de Jamón – 2 unidades</p>
                <p><b>Pedido #035:</b> Malteada Oreo – 1 unidad</p>
                <p><b>Pedido #036:</b> Nachos – 3 unidades</p>
            </div>

            <button class="btn-gris" onclick="closeModal('modalPedidos')">Cerrar</button>
        </div>
    </div>

    <!-- ================= MODAL HORARIOS ================= -->
    <div class="modal" id="modalHorario">
        <div class="modal-content">
            <h2>Publicar / Editar Horarios</h2>

            <form>
                <label>Días disponibles:</label>
                <input type="text" placeholder="Lunes a Viernes">

                <label>Horario:</label>
                <input type="text" placeholder="8:00 AM - 3:00 PM">

                <button type="submit" class="btn-azul">Guardar</button>
                <button type="button" class="btn-gris" onclick="closeModal('modalHorario')">Cerrar</button>
            </form>
        </div>
    </div>

            <script>
            function openModal(id) {
                document.getElementById(id).classList.add("show");
            }
            function closeModal(id) {
                document.getElementById(id).classList.remove("show");
            }
            </script>
            <!-- FOOTER -->
            <div class="footer">
                <p class="footerText">© 2025 Cafetería. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
            </div>

</body>
</html>
