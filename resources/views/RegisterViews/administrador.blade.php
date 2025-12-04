<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador General</title>
    <link rel="stylesheet" href="../css/administrador.css">
    <link rel="stylesheet" href="../css/header.css">
</head>
<body class="overlay img">

<!-- ======================== HEADER ========================= -->
@include('NavegationViews.header')

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
    <section class="secciones-perfil">
        <h2 class="subtitulo2">Opciones</h2>
        <div class="opciones-grid">
            <div class="opcion-card" onclick="mostrarSeccion('usuarios')">
                <i class='bx bxs-heart'></i>
                <p>Usuarios</p>
            </div>
            <div class="opcion-card" onclick="mostrarSeccion('tiendas')">
                <i class='bx bx-time'></i>
                <p>Tiendas</p>
            </div>
            <div class="opcion-card" onclick="mostrarSeccion('productos')">
                <i class='bx bx-time'></i>
                <p>Productos</p>
            </div>
            <div class="opcion-card" onclick="mostrarSeccion('promociones')">
                <i class='bx bx-time'></i>
                <p>Promociones</p>
            </div>
            <div class="opcion-card" onclick="mostrarSeccion('reportes')">
                <i class='bx bx-time'></i>
                <p>Reportes</p>
            </div>
            <div class="opcion-card" onclick="mostrarSeccion('ayuda')">
                <i class='bx bx-time'></i>
                <p>Ayuda</p>
            </div>
        </div>

        <div id="contenido-dinamico" class="contenido-dinamico">
            <p>Selecciona una opción para ver más información.</p>
        </div>
    </section>

</main>

<!-- ======================== MODALS ========================= -->
@include('Modals.AgregarUsuarioModal')
@include('Modals.EditarUsuarioModal')
@include('Modals.AgregarTiendaModal')
@include('Modals.EditarTiendaModal')

<!-- ======================== FOOTER ========================= -->
<div class="footer">
    <p class="footerText">© 2025 Cafetería. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
</div>

<!-- ======================== VARIABLES GLOBALES ========================= -->
<script>
    const csrf = "{{ csrf_token() }}";

    const rutasUsuarios = {
        mostrar: "{{ route('usuarios.mostrar') }}",
        registrar: "{{ route('usuarios.registrar') }}",
        actualizar: "/usuarios/actualizar/",
        eliminar: "/usuarios/eliminar/"
    };

    const rutasTiendas = {
        mostrar: "{{ route('tiendas.mostrar') }}",
        registrar: "{{ route('tiendas.registrar') }}",
        actualizar: "/tiendas/actualizar/",
        eliminar: "/tiendas/eliminar/"
    };
</script>

<script src="{{ asset('js/AdminGeneral.js') }}"></script>


</body>
</html>
