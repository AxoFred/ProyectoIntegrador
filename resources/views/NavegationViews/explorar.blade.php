
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saborytec | Explorar</title>
  <link rel="stylesheet" href="../css/explorar.css">
</head>

<body>
  <div class="img">
    <div class="overlay">
        
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

  <!--section 1-->
  <section class="contenedor">

        <h1 class="titulo"><i class='bx bx-store-alt icono-titulo'></i> Explorar Catálogos</h1>
        <p class="subtitulo">Descubre productos de diferentes vendedores del instituto</p>

        <div class="cards1">

            <!-- Cafetería -->
            <a href="#" class="card1 card-cafeteria">
                <div class="card-icon">
                    <i class='bx bx-coffee'></i>
                </div>
                <span class="productos">0 productos</span>

                <h2>Cafetería</h2>
                <p>Alimentos y bebidas del instituto</p>
            </a>

            <!-- Vendedores Externos -->
            <a href="#" class="card1 card-externos">
                <div class="card-icon">
                    <i class='bx bx-store'></i>
                </div>
                <span class="productos">0 productos</span>

                <h2>Vendedores Externos</h2>
                <p>Productos de tiendas autorizadas</p>
            </a>

            <!-- Comercio Estudiantil -->
            <a href="#" class="card1 card-estudiantil">
                <div class="card-icon">
                    <i class='bx bx-group'></i>
                </div>
                <span class="productos">0 productos</span>

                <h2>Comercio Estudiantil</h2>
                <p>Emprendimientos de alumnos</p>
            </a>

        </div>

        <!-- Buscador -->
        <div class="buscador">
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Buscar productos o vendedores...">
        </div>

    </section>

    <!--section productos-->

    <!-- seccion 1 -->
      <section class="container">
        <div><h2>CATALOGO DE PRODUCTOS</h2></div>
        <div class="cards">
          <div class="card blocked">
            <img src="../Assets/img/cafe.jpeg" alt="Café Especial">
            <div class="lock">Disponible</div>
            <h3>Café Especial</h3>
            <p>Fecha: 18/08/2025</p>
            <p>$16.00</p>
          </div>
          <div class="card blocked">
            <img src="../Assets/img/tortas.jpg" alt="Torta Especial">
            <div class="lock">Disponible</div>
            <h3>Torta Especial</h3>
            <p>Fecha: 17/08/2025</p>
            <p>$42.50</p>
          </div>
          <div class="card blocked">
            <img src="../Assets/img/hamburgueza2.jpg" alt="Hamburguesa">
            <div class="lock">Disponible</div>
            <h3>Hamburguesa</h3>
            <p>Fecha: 15/08/2025</p>
            <p>$50.00</p>
          </div>

          <div class="card blocked">
            <img src="../Assets/img/coctel de frutas.jpg" alt="Coctel de Frutas">
            <div class="lock">Disponible</div>
            <h3>Coctel de frutas</h3>
            <p>Fecha: 17/08/2025</p>
            <p>$42.50</p>
          </div>
        </div>
      </section>

      <!-- seccion 2 -->
      <section class="container">
        <div class="cards">
          <div class="card blocked">
            <img src="../Assets/img/hotdog.jpg" alt="Hot dog">
            <div class="lock">Disponible</div>
            <h3>Hot Dog</h3>
            <p>Fecha: 18/08/2025</p>
            <p>$16.00</p>
          </div>
          <div class="card blocked">
            <img src="../Assets/img/tacos de canasta.jpg" alt="Tacos de canasta">
            <div class="lock">Disponible</div>
            <h3>Tacos de canasta</h3>
            <p>Fecha: 17/08/2025</p>
            <p>$42.50</p>
          </div>
          <div class="card blocked">
            <img src="../Assets/img/coca.jpg" alt="coca">
            <div class="lock">Disponible</div>
            <h3>Coca-cola</h3>
            <p>Fecha: 15/08/2025</p>
            <p>$50.00</p>
          </div>

          <div class="card blocked">
            <img src="../Assets/img/tamal.jpg" alt="Tamal">
            <div class="lock">Disponible</div>
            <h3>Tamal</h3>
            <p>Fecha: 17/08/2025</p>
            <p>$42.50</p>
          </div>
        </div>
      </section>
     
      <!-- seccion 3 -->
      <section class="container">
        <div class="cards">
          <div class="card blocked">
            <img src="../Assets/img/aguas.png" alt="Aguas">
            <div class="lock">Disponible</div>
            <h3>Aguas</h3>
            <p>Fecha: 18/08/2025</p>
            <p>$16.00</p>
          </div>
          <div class="card blocked">
            <img src="../Assets/img/boing.jpg" alt="boing">
            <div class="lock">Disponible</div>
            <h3>Boing</h3>
            <p>Fecha: 17/08/2025</p>
            <p>$42.50</p>
          </div>
          <div class="card blocked">
            <img src="../Assets/img/hamburgueza2.jpg" alt="Hamburguesa">
            <div class="lock">Disponible</div>
            <h3>Hamburguesa</h3>
            <p>Fecha: 15/08/2025</p>
            <p>$50.00</p>
          </div>

          <div class="card blocked">
            <img src="../Assets/img/quesadillas.jpg" alt="quesadillas">
            <div class="lock">Disponible</div>
            <h3>Quesadillas</h3>
            <p>Fecha: 17/08/2025</p>
            <p>$42.50</p>
          </div>
        </div>
      </section>

   <!-- FOOTER -->
  <footer class="footer">
    <p class="footerText">
      © 2025 ITSSMT. Todos los derechos reservados. Autores: FREDY & VICTOR
    </p>
  </footer>

</html>