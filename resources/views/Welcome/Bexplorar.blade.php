
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saborytec | Explorar</title>
  <link rel="stylesheet" href="{{ asset('css/Bexplorar.css') }}">
</head>

<body>
  <div class="img">
    <div class="overlay">
        
    <!-- Encabezado -->
   <!-- HEADER -->
  <header class="header">
    <div class="logo"><h1>SABORYTEC</h1></div>

    <nav class="nav">
        <a href="{{ route('Binicio') }}">Inicio</a>
        <a href="{{ route('Bexplorar') }}">Explorar</a>
        <a href="{{ route('Bcarrito') }}">Carrito</a>
        <a href="{{ route('Bpedidos') }}">Pedidos</a>
    </nav>

    <button class="login-btn" onclick="window.location.href='{{ url('/login') }}'">Iniciar Sesion</button>
  </header>

  <!--section 1-->
  <section class="contenedor">

        <h1 class="titulo"><i class='bx bx-store-alt icono-titulo'></i>Explorar Catálogos</h1>
        <p class="subtitulo">Para describir mas productos debes iniciar sesion</p>

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


   <!-- FOOTER -->
  <footer class="footer">
    <p class="footerText">
      © 2025 ITSSMT. Todos los derechos reservados. Autores: FREDY & VICTOR
    </p>
  </footer>

</html>