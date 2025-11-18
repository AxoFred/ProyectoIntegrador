<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador General</title>
    <link rel="stylesheet" href="../css/administrador.css">
</head>
<body class="overlay img">

<!-- ======================== HEADER ========================= -->
        
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

    <h1 class="titulo">Panel de Administrador General</h1>

<!-- ======================== TARJETAS RESUMEN ========================= -->
    <section class="tarjetas-grid">
        <div class="tarjeta">
            <h3>Usuarios Registrados</h3>
            <p class="num">128</p>
        </div>

        <div class="tarjeta">
            <h3>Vendedores Activos</h3>
            <p class="num">12</p>
        </div>

        <div class="tarjeta">
            <h3>Productos Totales</h3>
            <p class="num">248</p>
        </div>

        <div class="tarjeta">
            <h3>Pedidos del Día</h3>
            <p class="num">63</p>
        </div>

    </section>
<!-- ======================== OPCIONES ========================= -->
          <!-- SECCIONES DEL PERFIL -->
      <section class="secciones-perfil">

          <h2 class="subtitulo2">Opciones</h2>

          <div class="opciones-grid">

              <div class="opcion-card" onclick="mostrarSeccion('usuarios')">
                  <i class='bx bxs-heart'></i>
                  <p>Usuarios</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('vendedores')">
                  <i class='bx bxs-cart'></i>
                  <p>Vendedores</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('productos')">
                  <i class='bx bx-time'></i>
                  <p>Productos</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('horarios')">
                  <i class='bx bx-time'></i>
                  <p>Horarios</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('promociones')">
                  <i class='bx bx-time'></i>
                  <p>Promociones</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('reportes')">
                  <i class='bx bx-time'></i>
                  <p>Reportes</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('estadisticas')">
                  <i class='bx bx-time'></i>
                  <p>Estadisticas</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('soporte')">
                  <i class='bx bx-time'></i>
                  <p>Soporte</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('navegacion de usuarios')">
                  <i class='bx bx-time'></i>
                  <p>Navegacion</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('negocios')">
                  <i class='bx bx-time'></i>
                  <p>Negocios</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('contratos')">
                  <i class='bx bx-time'></i>
                  <p>Contratos</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('ayuda')">
                  <i class='bx bx-time'></i>
                  <p>Ayuda</p>
              </div>

          </div>

          <!-- CONTENIDO QUE CAMBIA SIN RECARGAR -->
          <div id="contenido-dinamico" class="contenido-dinamico">
              <p>Selecciona una opción para ver más información.</p>
          </div>

      </section>

    </main>
<!-- ======================== MODALS ========================= -->
            <!-- AGREGAR USUARIO -->
        <div class="modal" id="modalAddUser">
            <div class="modal-content">
                <h2>Agregar Usuario</h2>
                <form>
                    <label>Correo institucional:</label>
                    <input type="email">

                    <label>Nombre:</label>
                    <input type="text">

                    <label>Rol:</label>
                    <select>
                        <option>Alumno</option>
                        <option>Docente</option>
                        <option>Vendedor</option>
                        <option>Administrador</option>
                    </select>

                    <button class="btn-azul">Guardar</button>
                    <button type="button" class="btn-gris" onclick="closeModal('modalAddUser')">Cerrar</button>
                </form>
            </div>
        </div>

        <!-- EDITAR USUARIO -->
        <div class="modal" id="modalEditUser">
            <div class="modal-content">
                <h2>Editar Usuario</h2>
                <form>
                    <label>Correo:</label>
                    <input type="email" value="juan@school.edu">

                    <label>Nombre:</label>
                    <input type="text" value="Juan Pérez">

                    <label>Estado:</label>
                    <select>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>

                    <button class="btn-azul">Guardar cambios</button>
                    <button type="button" class="btn-gris" onclick="closeModal('modalEditUser')">Cerrar</button>
                </form>
            </div>
        </div>
<!-- ======================== FOOTER ========================= -->
        <div class="footer">
            <p class="footerText">© 2025 Cafetería. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
        </div>

<!-- ======================== TABLAS Y DINAMICO ========================= -->
          <!-- SCRIPT DINÁMICO -->
    <script>
      function mostrarSeccion(seccion) {
          const cont = document.getElementById("contenido-dinamico");

          if (seccion === "usuarios") {
              cont.innerHTML = `
                  <h3 class='titulo-seccion'>Tabla de Usuarios</h3>
                  <p class='texto-seccion'>Aquí se mostrarán todos los usuarios</p>



                  <!-- ===================== USUARIOS ===================== -->
                    <div class="acciones-panel">
                        <button class="btn-azul" onclick="openModal('modalAddUser')">➕ Agregar Usuario</button>
                    </div>

                    <div class="tabla-contenedor">
                        <table class="tabla-admin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Correo</th>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>juan@school.edu</td>
                                    <td>Juan Pérez</td>
                                    <td>Alumno</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn-tabla editar" onclick="openModal('modalEditUser')">Editar</button>
                                        <button class="btn-tabla eliminar">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

              `;
          }

          if (seccion === "vendedores") {
              cont.innerHTML = `
                  <h3 class='titulo-seccion'>Tabla de Vendedores</h3>
                  <p class='texto-seccion'>Aquí se mostrarán todos los vendedores</p>
                

                      <!-- ===================== VENDEDORES ===================== -->
                        <div class="acciones-panel">
                            <button class="btn-azul" onclick="openModal('modalAddVendor')">➕ Agregar Vendedor</button>
                        </div>

                        <div class="tabla-contenedor">
                            <table class="tabla-admin">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Correo</th>
                                        <th>Nombre del local</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>V01</td>
                                        <td>cafeteria1@school.edu</td>
                                        <td>Cafetería Central</td>
                                        <td>Activo</td>
                                        <td>
                                            <button class="btn-tabla editar" onclick="openModal('modalEditVendor')">Editar</button>
                                            <button class="btn-tabla eliminar">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

              `;
          }

          if (seccion === "productos") {
              cont.innerHTML = `
                  <h3 class='titulo-seccion'>Tabla de Productos</h3>
                  <p class='texto-seccion'>Nuevos productos</p>


                   <!-- ===================== PRODUCTOS ===================== -->
                    <div class="tabla-contenedor">
                        <table class="tabla-admin">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Vendedor</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><img src="img/producto1.jpg" class="img-producto"></td>
                                    <td>P01</td>
                                    <td>Malteada Oreo</td>
                                    <td>$35</td>
                                    <td>Cafetería Central</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn-tabla editar" onclick="openModal('modalEditProduct')">Aprobar</button>
                                        <button class="btn-tabla eliminar">Rechazar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              `;
          }
      }
  </script>

    <script>
        function openModal(id){ document.getElementById(id).classList.add("show"); }
        function closeModal(id){ document.getElementById(id).classList.remove("show"); }
    </script>
  
</body>
</html>
