<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saborytec | Mis pedidos</title>
  <link rel="stylesheet" href="../css/pedidos.css">
  <link rel="stylesheet" href="../css/header.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="overlay img">

    <!-- HEADER -->
    @include('NavegationViews.header')

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

        <!-- LISTA DE PEDIDOS -->
        <div class="pedidos">

            <!-- Pedido -->
            <div class="pedido-card">
                <div class="pedido-header">
                    <h3>Pedido #12</h3>
                    <span class="estado completado">Completado</span>
                </div>

                <p class="fecha"><i class='bx bx-calendar'></i> 12 Nov 2025 - 12:30 PM</p>

                <div class="pedido-info">
                    <p><strong>Productos:</strong> 3</p>
                    <p><strong>Total:</strong> $135.00 MXN</p>
                </div>

                <a href="#" class="btn-detalles">
                    Ver detalles <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>

            <!-- Pedido -->
            <div class="pedido-card">
                <div class="pedido-header">
                    <h3>Pedido #14</h3>
                    <span class="estado pendiente">Pendiente</span>
                </div>

                <p class="fecha"><i class='bx bx-calendar'></i> 10 Nov 2025 - 3:40 PM</p>

                <div class="pedido-info">
                    <p><strong>Productos:</strong> 1</p>
                    <p><strong>Total:</strong> $45.00 MXN</p>
                </div>

                <a href="#" class="btn-detalles">
                    Ver detalles <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>

                        <!-- Pedido -->
            <div class="pedido-card">
                <div class="pedido-header">
                    <h3>Pedido #15</h3>
                    <span class="estado completado">Completado</span>
                </div>

                <p class="fecha"><i class='bx bx-calendar'></i> 12 Nov 2025 - 12:30 PM</p>

                <div class="pedido-info">
                    <p><strong>Productos:</strong> 3</p>
                    <p><strong>Total:</strong> $135.00 MXN</p>
                </div>

                <a href="#" class="btn-detalles">
                    Ver detalles <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
        <div class="footer">
                <p class="footerText">© 2025 Cafetería. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
        </div>

</body>
</html>
