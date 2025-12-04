<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saborytec | Perfil</title>
  <link rel="stylesheet" href="../css/perfil.css">
  <link rel="stylesheet" href="../css/header.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="overlay img">

     <!-- HEADER -->
    @include('NavegationViews.header')

  <!-- CONTENIDO -->
  <section class="contenedor">
      <!-- TITULO -->
      <h1 class="titulo">
          <i class='bx bx-user-circle icono-titulo'></i>
          Mi Perfil
      </h1>
      <p class="subtitulo">Información de tu cuenta</p>

      <!-- CARD PERFIL -->
      <div class="perfil-card">
          <div class="perfil-info">
              <div class="avatar">
                  <i class='bx bxs-user'></i>
              </div>
              <h2 class="nombre">AxoFred</h2>
              <p class="correo">I2240046@smartin.tecnm.mx</p>
              <p class="rol">Estudiante</p>
              <p class="rol">Grado y Grupo: 7 B</p>        
          </div>
          <div class="acciones">
              <a href="#" class="btn"><i class='bx bx-edit'></i> Editar perfil</a>
              <a href="#" class="btn"><i class='bx bx-lock-alt'></i> Cambiar contraseña</a>
              <a href="#" class="btn logout"><i class='bx bx-log-out'></i> Cerrar sesión</a>
          </div>
      </div>

      <!-- SECCIONES DEL PERFIL -->
      <section class="secciones-perfil">

          <h2 class="subtitulo2">Opciones</h2>

          <div class="opciones-grid">

              <div class="opcion-card" onclick="mostrarSeccion('favoritos')">
                  <i class='bx bxs-heart'></i>
                  <p>Mis Favoritos</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('compras')">
                  <i class='bx bxs-cart'></i>
                  <p>Mis Compras</p>
              </div>

              <div class="opcion-card" onclick="mostrarSeccion('historial')">
                  <i class='bx bx-time'></i>
                  <p>Historial</p>
              </div>

          </div>

          <!-- CONTENIDO QUE CAMBIA SIN RECARGAR -->
          <div id="contenido-dinamico" class="contenido-dinamico">
              <p>Selecciona una opción para ver más información.</p>
          </div>

      </section>

  </section>

  <!-- FOOTER -->
  <div class="footer">
     <p class="footerText">© 2025 Cafetería. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
  </div>


  <!-- SCRIPT DINÁMICO -->
  <script>
      function mostrarSeccion(seccion) {
          const cont = document.getElementById("contenido-dinamico");

          if (seccion === "favoritos") {
              cont.innerHTML = `
                  <h3 class='titulo-seccion'>❤️ Mis Favoritos</h3>
                  <p class='texto-seccion'>Aquí aparecerán los productos que marcaste como favoritos.</p>
              `;
          }

          if (seccion === "compras") {
              cont.innerHTML = `
                  <h3 class='titulo-seccion'>🛒 Mis Compras</h3>
                  <p class='texto-seccion'>Aquí podrás ver tus compras realizadas dentro de la cafetería.</p>
              `;
          }

          if (seccion === "historial") {
              cont.innerHTML = `
                  <h3 class='titulo-seccion'>📅 Historial</h3>
                  <p class='texto-seccion'>Aquí se mostrará el historial de actividad de tu cuenta.</p>
              `;
          }
      }
  </script>

</body>
</html>
