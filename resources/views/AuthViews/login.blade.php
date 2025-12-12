<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saborytec | Login</title>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <link rel="stylesheet" href="{{ asset('css/login.css') }}?v={{ time() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


</head>
<body>

  <div class="background">

    <div class="card">

      <div class="img">
        <img src="{{ asset('Assets/img/LOGO-PNG.png') }}" alt="logo" width="80" height="80">
      </div>

      <div class="tit">
        <h3>Iniciar sesión</h3>
        <h2>SaboryTec</h2>
      </div>

      {{-- FORMULARIO --}}
      <form action="{{ url('/autentificacion') }}" method="POST">
        @csrf

        <div class="input-container">
          <ion-icon name="mail-outline" class="icon"></ion-icon>
          <input type="email" name="correo" placeholder="Correo institucional" class="input" required>
        </div>

        <div class="input-container">
          <ion-icon name="lock-closed-outline" class="icon"></ion-icon>
          <input type="password" name="password" placeholder="Contraseña" class="input" required>
        </div>

        <!-- olvido de contraseña -->

        <div>
            <a href="{{ route('password.forgot') }}" style="color: white;">¿Olvidaste tu contraseña?</a>
        </div>

        <button class="button" type="submit">
          <span class="button-text">Iniciar sesión</span>
        </button>

      </form>

    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        @if (session('sessionLogin') == 'true')
            Toast.fire({
                icon: 'success',
                title: '{{ session('Message') }}'
            });
        @endif

        @if (session('sessionLogin') == 'false')
            Toast.fire({
                icon: 'error',
                title: '{{ session('Message') }}'
            });
        @endif
    });
  </script>

</body>
</html>
