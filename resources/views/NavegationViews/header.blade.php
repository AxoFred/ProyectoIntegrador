    <!-- Encabezado -->
  <header class="header">
    <div class="logo"><h1>SABORYTEC</h1></div>

    <nav class="nav">
        
        <a href="{{ route('inicio') }}">Inicio</a>
        <a href="{{ route('explorar') }}">Explorar</a>
        <a href="{{ route('carrito') }}">Carrito</a>
        <a href="{{ route('pedidos') }}">Pedidos</a>

        @if(session('rol') == 2)
            <a href="{{ route('vendedor') }}">vendedor</a>
        @endif

        @if(session('rol') == 1)
            <a href="{{ route('administrador') }}">Administrador</a>
        @endif

    </nav>

    <!-- AGREGADO: Contenedor para agrupar los botones a la derecha -->
    <div class="header-buttons">
        <button class="login-btn"  onclick="window.location.href='{{ route('perfil') }}'">Mi perfil</button>
        <button class="login-btn" onclick="window.location.href='{{ url('/') }}'">Cerrar Sesion</button>
    </div>

  </header>