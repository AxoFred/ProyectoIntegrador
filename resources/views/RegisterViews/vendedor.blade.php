<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Vendedores</title>

    <link rel="stylesheet" href="../css/vendedor.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body class="overlay img">

    <!-- HEADER -->
    @include('NavegationViews.header')

    <main class="container">

        <h1 class="titulo">Panel de Vendedor</h1>

        <!-- ======================== TARJETAS RESUMEN ========================= -->
        <section class="tarjetas-grid">
            <div class="tarjeta">
                <h3>Pedidos del Día</h3>
                <p class="num">128</p>
            </div>

            <div class="tarjeta">
                <h3>Productos Activos</h3>
                <p class="num">12</p>
            </div>

            <div class="tarjeta">
                <h3>Ventas</h3>
                <p class="num">248</p>
            </div>

            <div class="tarjeta">
                <h3>Ingresos</h3>
                <p class="num">10063</p>
            </div>
        </section>

        <!-- ======================== OPCIONES ========================= -->
        <section class="secciones-perfil">

            <h2 class="subtitulo2">Opciones</h2>

            <div class="opciones-grid">
                <div class="opcion-card" onclick="mostrarSeccion('productos')">
                    <i class='bx bx-time'></i>
                    <p>Productos</p>
                </div>

                <div class="opcion-card" onclick="mostrarSeccion('pedidos')">
                    <i class='bx bx-receipt'></i>
                    <p>Pedidos</p>
                </div>

                <div class="opcion-card" onclick="mostrarSeccion('Horarios')">
                    <i class='bx bx-time'></i>
                    <p>Horarios</p>
                </div>

                <div class="opcion-card" onclick="mostrarSeccion('reportes')">
                    <i class='bx bx-file'></i>
                    <p>Reportes</p>
                </div>

                <div class="opcion-card" onclick="mostrarSeccion('ayuda')">
                    <i class='bx bx-help-circle'></i>
                    <p>Ayuda</p>
                </div>
            </div>

            <div id="contenido-dinamico" class="contenido-dinamico">
                <p>Selecciona una opción para ver más información.</p>
            </div>

        </section>

    </main>

    <!-- ======================== MODAL AGREGAR PRODUCTO ========================= -->
    <div class="modal" id="modalAddProduct">
        <div class="modal-content">
            <h2>Agregar Producto</h2>

            <form id="formAddProduct" enctype="multipart/form-data">
                @csrf
                <label>Imagen:</label>
                <input type="file" name="imagen" accept="image/*" required>
                <div id="previewAddContainer"></div>

                <label>Nombre:</label>
                <input type="text" name="nombre" required>

                <label>Marca:</label>
                <input type="text" name="marca" required>

                <label>Descripción:</label>
                <input type="text" name="descripcion">

                <label>Precio:</label>
                <input type="number" name="precio" required>

                <label>Estado:</label>
                <select name="estado" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>

                <label>Categoría:</label>
                <input type="number" name="ID_categoria" required>

                <label>Tienda:</label>
                <input type="number" name="ID_tienda" required>

                <button type="submit" class="btn-azul">Guardar</button>
                <button type="button" class="btn-gris" onclick="closeModal('modalAddProduct')">Cerrar</button>
            </form>
        </div>
    </div>

    <!-- ======================== MODAL EDITAR PRODUCTO ========================= -->
    <div class="modal" id="modalEditProduct">
        <div class="modal-content">
            <h2>Editar Producto</h2>

            <form id="formEditProduct" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ID_producto">

                <label>Imagen:</label>
                <input type="file" name="imagen" accept="image/*">
                <div id="previewEditContainer"></div>

                <label>Nombre:</label>
                <input type="text" name="nombre" required>

                <label>Marca:</label>
                <input type="text" name="marca" required>

                <label>Descripción:</label>
                <input type="text" name="descripcion">

                <label>Precio:</label>
                <input type="number" name="precio" required>

                <label>Estado:</label>
                <select name="estado" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>

                <label>Categoría:</label>
                <input type="number" name="ID_categoria" required>

                <label>Tienda:</label>
                <input type="number" name="ID_tienda" required>

                <button type="submit" class="btn-azul">Actualizar</button>
                <button type="button" class="btn-gris" onclick="closeModal('modalEditProduct')">Cerrar</button>
            </form>
        </div>
    </div>

    <!-- ======================== SCRIPTS ========================= -->
    <script>
        const token = '{{ csrf_token() }}';

        function openModal(id){ document.getElementById(id).classList.add("show"); }
        function closeModal(id){ document.getElementById(id).classList.remove("show"); }

        function mostrarSeccion(seccion) {
            const cont = document.getElementById("contenido-dinamico");
            if(seccion === "productos"){
                cont.innerHTML = `
                    <h3 class='titulo-seccion'>Productos Registrados</h3>
                    <div class="acciones-panel">
                        <button class="btn-azul" onclick="openModal('modalAddProduct')">➕ Agregar Producto</button>
                    </div>
                    <div class="tabla-contenedor">
                        <table class="tabla-admin">
                            <thead>
                                <tr>
                                    
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Tienda</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="productos-tbody"></tbody>
                        </table>
                    </div>
                `;
                cargarProductos();
            }
        }

        function cargarProductos() {
            fetch("{{ route('productos.mostrar') }}")
            .then(res => res.json())
            .then(data => {
                const tbody = document.getElementById("productos-tbody");
                tbody.innerHTML = "";
                data.forEach(p => {
                    tbody.innerHTML += `
                        <tr>
                            
                            <td>${p.imagen ? `<img src="/storage/${p.imagen}" width="60">` : ''}</td>
                            <td>${p.nombre}</td>
                            <td>${p.marca}</td>
                            <td>${p.descripcion}</td>
                            <td>$${p.precio}</td>
                            <td>${p.estado}</td>
                            <td>${p.ID_categoria}</td>
                            <td>${p.ID_tienda}</td>
                            <td>
                                <button class="btn-tabla editar" onclick="editarProducto(${p.ID_producto})">Editar</button>
                                <button class="btn-tabla eliminar" onclick="eliminarProducto(${p.ID_producto})">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
            });
        }

        // Previsualización agregar
        document.querySelector("#formAddProduct input[name='imagen']").addEventListener("change", function(){
            const file = this.files[0];
            if(file){
                const reader = new FileReader();
                reader.onload = e => {
                    let cont = document.getElementById("previewAddContainer");
                    cont.innerHTML = `<img src="${e.target.result}" width="100">`;
                }
                reader.readAsDataURL(file);
            }
        });

        // Agregar producto
        document.getElementById("formAddProduct").addEventListener("submit", function(e){
            e.preventDefault();
            let formData = new FormData(this);
            fetch("{{ route('productos.registrar') }}", {
                method: "POST",
                headers: { 'X-CSRF-TOKEN': token },
                body: formData
            })
            .then(res => res.json())
            .then(resp => {
                if(resp.success){
                    closeModal('modalAddProduct');
                    this.reset();
                    document.getElementById("previewAddContainer").innerHTML = '';
                    cargarProductos();
                } else alert(resp.error);
            });
        });

        // Llenar modal editar
        function editarProducto(id){
            fetch("{{ route('productos.mostrar') }}")
            .then(res => res.json())
            .then(data => {
                const p = data.find(x => x.ID_producto == id);
                const form = document.getElementById("formEditProduct");

                form.ID_producto.value = p.ID_producto;
                form.nombre.value = p.nombre;
                form.marca.value = p.marca;
                form.descripcion.value = p.descripcion;
                form.precio.value = p.precio;
                form.estado.value = p.estado;
                form.ID_categoria.value = p.ID_categoria;
                form.ID_tienda.value = p.ID_tienda;

                // Previsualización editar
                let cont = document.getElementById("previewEditContainer");
                cont.innerHTML = p.imagen ? `<img src="/storage/${p.imagen}" width="100">` : '';

                openModal('modalEditProduct');
            });
        }

        // Previsualización editar
        document.querySelector("#formEditProduct input[name='imagen']").addEventListener("change", function(){
            const file = this.files[0];
            if(file){
                const reader = new FileReader();
                reader.onload = e => {
                    document.getElementById("previewEditContainer").innerHTML = `<img src="${e.target.result}" width="100">`;
                }
                reader.readAsDataURL(file);
            }
        });

        // Guardar edición
        document.getElementById("formEditProduct").addEventListener("submit", function(e){
            e.preventDefault();
            let id = this.ID_producto.value;
            let formData = new FormData(this);

            fetch(`/productos/actualizar/${id}`, {
                method: "POST",
                headers: { 'X-CSRF-TOKEN': token },
                body: formData
            })
            .then(res => res.json())
            .then(resp => {
                if(resp.success){
                    closeModal('modalEditProduct');
                    document.getElementById("previewEditContainer").innerHTML = '';
                    cargarProductos();
                } else alert(resp.error);
            });
        });

        // Eliminar producto
        function eliminarProducto(id){
            if(!confirm("¿Eliminar producto?")) return;
            fetch(`/productos/eliminar/${id}`, {
                method: "DELETE",
                headers: { 'X-CSRF-TOKEN': token }
            })
            .then(res => res.json())
            .then(resp => {
                if(resp.success) cargarProductos();
                else alert(resp.error);
            });
        }

    </script>

</body>
</html>
