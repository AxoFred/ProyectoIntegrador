<!-- panel-vendedor-visionos.html -->
<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Panel Vendedor</title>
        <link rel="stylesheet" href="../css/vendedor.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

 @include('NavegationViews.header')

 <div class="sidebar">
  <!-- MENÚ -->
    <ul class="menu">
    <li><i class="fa-solid fa-user"></i><span>TAQUERIA MICHEL</span></li>
    <li><i class="fa-solid fa-box"></i><span>Productos</span></li>
    <li><i class="fa-solid fa-receipt"></i><span>Pedidos</span></li>
    <li><i class="fa-solid fa-clock"></i><span>Horarios</span></li>
    <li><i class="fa-solid fa-credit-card"></i><span>Pagos</span></li>
    <li><i class="fa-solid fa-gear"></i><span>Ajustes</span></li>
    </ul>

    <!-- ESTADÍSTICAS -->
    <div class="stats">
        <div class="stat">
        <h3>$1,240</h3>
        <p>Ventas</p>
        </div>
        <div class="stat">
        <h3>12</h3>
        <p>Pedidos</p>
        </div>
    </div>
    <!-- FOOTER -->
    <p class="sync">Última sincronización: 10:45</p>
    </div>


</body>
</html>
