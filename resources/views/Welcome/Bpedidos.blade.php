<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saborytec | Mis pedidos</title>
  <link rel="stylesheet" href="{{ asset('css/Bpedidos.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="overlay img">

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

    <button class="login-btn" onclick="window.location.href='{{ url('/login') }}'">INICIAR SESION</button>
  </header>

    <!-- CONTENEDOR -->
    <section class="contenedor">

        <h1 class="titulo">
            <i class='bx bx-receipt icono-titulo'></i>
            Mis pedidos
        </h1>
        <p class="subtitulo">Historial detallado de todas tus compras</p>

        <!-- SI NO HAY PEDIDOS -->
        <!--
        <div class="empty-state">
            <h2>No tienes pedidos aún</h2>
            <p>Cuando compres algo, aparecerá aquí.</p>
        </div>
        -->
        <h2 style="text-align: center; padding: 23%;">Te encuentras en modo invitado, por favor inicia sesion</h2>

    </section>

    <!-- FOOTER -->
        <div class="footer">
                <p class="footerText">© 2025 Cafetería. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
        </div>

</body>
</html>
