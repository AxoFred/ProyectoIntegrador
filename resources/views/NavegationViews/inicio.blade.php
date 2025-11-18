<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saborytec | Inicio</title>
    <link rel="stylesheet" href="../css/inicio.css">
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

        <!-- CONTENIDO SCROLL -->
        <main class="scroll">

            <div class="big-card">
                <div class="card-content">
                    <!-- IZQUIERDA -->
                    <div class="left-section">
                        <div class="icon-title">
                            <span class="star">✦</span>
                            <p>Bienvenid@s</p>
                        </div>

                        <h1>Hola, AxoFred</h1>

                        <p class="description">
                            Ordena con anticipación y recoge en el momento perfecto.  
                            Sin esperas, sin complicaciones.
                        </p>

                        <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                            <span class="botonText">+ Nuevo Pedido</span>
                        </button>
                    </div>

                    <!-- DERECHA: PEDIDOS RÁPIDOS -->
                    <div class="right-section">
                        <div class="card-side">
                            <img src="../Assets/img/LOGO-PNG.png" class="logob" alt="Logo Saborytec">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- seccion 1 -->
            <div class="big-card2">
                <section class="container">
                <div>
                    <h2>Productos Destacados</h2>
                </div>
                
                <div class="cards">

                <a href="#" class="card blocked">
                    <img src="../Assets/img/hamburgueza2.jpg" alt="hamburgueza">
                    <div class="lock">Disponible</div>
                    <h3>hamburgueza</h3>
                    <p>$ 25 MX</p>

                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">COMPRAR</span>
                    </button>
                </a>

                <a href="#" class="card blocked">
                    <img src="../Assets/img/tacosalpastor.jpg" alt="Tacos">
                    <div class="lock">Disponible</div>
                    <h3>Tacos Al Pastor</h3>
                    <p>$ 35 MX</p>
                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">COMPRAR</span>
                    </button>
                </a>

                <a href="#" class="card blocked">
                    <img src="../Assets/img/coca.jpg" alt="coca-cola">
                    <div class="lock">Disponible</div>
                    <h3>Coca-Cola</h3>
                    <p>$25</p>
                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">COMPRAR</span>
                    </button>
                </a>

                <a href="#" class="card blocked">
                    <img src="../Assets/img/tortas.jpg" alt="tortas">
                    <div class="lock">Disponible</div>
                    <h3>Tortas</h3>
                    <p>$ 40 MX</p>
                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">COMPRAR</span>
                    </button>
                </a>

                </div>
            </section>
            </div>

             <!-- seccion 2 -->
            <div class="big-card2">
                <section class="container">
                <div>
                    <h2>Tiendas Disponibles</h2>
                </div>
                
                <div class="cards">

                <a href="#" class="card blocked">
                    <img src="../Assets/img/fondoCafeteria.jpg" alt="Tienda1">
                    <div class="lock">Abierto</div>
                    <h3>Cafeteria</h3>
                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">Ver</span>
                    </button>
                </a>

                <a href="#" class="card blocked">
                    <img src="../Assets/img/cafeteria2.jpg" alt="Tienda2">
                    <div class="lock">Abierto</div>
                    <h3>Cafeteria</h3>
                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">Ver</span>
                    </button>
                </a>

                <a href="#" class="card blocked">
                    <img src="../Assets/img/fondoCafeteria.jpg" alt="Tienda3">
                    <div class="lock">Abierto</div>
                    <h3>Cafeteria</h3>
                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">Ver</span>
                    </button>
                </a>

                <a href="#" class="card blocked">
                    <img src="../Assets/img/cafeteria2.jpg" alt="Tienda4">
                    <div class="lock">Abierto</div>
                    <h3>Cafeteria</h3>
                    <button class="botonIniciar" onclick="window.location.href='{{ url('/explorar') }}'">
                        <span class="botonText">Ver</span>
                    </button>
                </a>

                </div>
            </section>
            </div>

            <!-- FOOTER -->
            <div class="footer">
                <p class="footerText">© 2025 Cafetería. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
            </div>

        </main>
    

</body>
</html>
