<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nuestro menú | Restaurante Premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #101010;
            color: #fff;
        }

        nav {
            display: flex;
            height: 80px;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            background: #171717;
            border-bottom: 1px solid #303030;
        }

        .logo {
            font-size: 20px;
            font-weight: 800;
        }

        .logo span,
        nav a:hover,
        nav a.active {
            color: #ff9800;
        }

        nav a {
            margin-left: 25px;
            color: #ccc;
            font-size: 13px;
            text-decoration: none;
        }

        .hero {
            display: flex;
            min-height: 310px;
            align-items: center;
            padding: 60px 8%;
            background:
                linear-gradient(90deg, rgba(0,0,0,.94), rgba(0,0,0,.35)),
                url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600') center/cover;
        }

        .hero-content {
            max-width: 650px;
        }

        .hero small,
        .section-heading small {
            color: #ff9800;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .hero h1 {
            margin: 12px 0;
            font-size: clamp(35px, 5vw, 55px);
        }

        .hero h1 span {
            color: #ff9800;
        }

        .hero p {
            color: #ccc;
            font-size: 14px;
        }

        .container {
            max-width: 1250px;
            padding: 55px 25px;
            margin: auto;
        }

        .section-heading {
            margin-bottom: 35px;
            text-align: center;
        }

        .section-heading h2 {
            margin-top: 8px;
            font-size: 30px;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 35px;
        }

        .filter-btn {
            padding: 10px 19px;
            background: #1c1c1c;
            color: #ccc;
            border: 1px solid #333;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(135deg, #ffb000, #ff6900);
            color: #111;
            border-color: transparent;
            font-weight: 700;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .card {
            overflow: hidden;
            background: #1b1b1b;
            border: 1px solid #303030;
            border-radius: 16px;
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-7px);
            border-color: #ff9800;
            box-shadow: 0 15px 35px #0008;
        }

        .photo,
        .photo-placeholder {
            height: 220px;
            background: #292929;
        }

        .photo {
            overflow: hidden;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .5s;
        }

        .card:hover .photo img {
            transform: scale(1.07);
        }

        .photo-placeholder {
            display: grid;
            place-items: center;
            color: #ff9800;
            font-size: 50px;
        }

        .info {
            padding: 20px;
        }

        .category {
            padding: 6px 10px;
            background: #ff980019;
            color: #ffad36;
            border-radius: 20px;
            font-size: 10px;
        }

        .info h3 {
            margin: 13px 0 8px;
            font-size: 18px;
        }

        .description {
            min-height: 38px;
            color: #999;
            font-size: 12px;
            line-height: 1.7;
        }

        .bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;
            margin-top: 15px;
            border-top: 1px solid #333;
        }

        .price {
            color: #ffae35;
            font-size: 21px;
            font-weight: 800;
        }

        .add-cart {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: linear-gradient(135deg, #ffb000, #ff6900);
            color: #111;
            border: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
        }

        .cart-floating {
            position: fixed;
            right: 25px;
            bottom: 25px;
            z-index: 50;
            padding: 16px 23px;
            background: linear-gradient(135deg, #ffb000, #ff6900);
            color: #111;
            border: none;
            border-radius: 50px;
            box-shadow: 0 8px 25px #ff980044;
            font-weight: 800;
            cursor: pointer;
        }

        .cart-floating i {
            margin-right: 8px;
        }

        .cart-count {
            padding: 3px 8px;
            margin-left: 8px;
            background: #171717;
            color: white;
            border-radius: 20px;
        }

        .cart-modal {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background: #000c;
        }

        .cart-modal.show {
            display: flex;
        }

        .cart-content {
            width: 100%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
            padding: 25px;
            background: #1b1b1b;
            border: 1px solid #444;
            border-radius: 16px;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .cart-close {
            background: none;
            color: white;
            border: none;
            font-size: 25px;
            cursor: pointer;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid #333;
            font-size: 13px;
        }

        .cart-item button {
            padding: 5px 9px;
            background: #822;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .cart-item-price {
            margin-top: 5px;
            color: #aaa;
        }

        .cart-subtotal {
            color: #ffae35;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            color: #ffae35;
            font-size: 20px;
            font-weight: 800;
        }

        .whatsapp-btn {
            display: block;
            width: 100%;
            padding: 14px;
            background: #25d366;
            color: white;
            border: none;
            border-radius: 9px;
            font-weight: 800;
            text-align: center;
            cursor: pointer;
        }

        .cart-empty {
            padding: 25px 5px;
            color: #999;
            text-align: center;
        }

        .customer-form {
            padding: 18px;
            margin-top: 20px;
            background: #242424;
            border: 1px solid #383838;
            border-radius: 12px;
        }

        .customer-form label {
            display: block;
            margin: 13px 0 7px;
            color: #ccc;
            font-size: 12px;
        }

        .customer-form input,
        .customer-form select,
        .customer-form textarea {
            width: 100%;
            padding: 12px;
            background: #171717;
            color: white;
            border: 1px solid #444;
            border-radius: 8px;
            outline: none;
        }

        .customer-form input:focus,
        .customer-form select:focus,
        .customer-form textarea:focus {
            border-color: #ff9800;
        }

        .customer-form textarea {
            resize: vertical;
        }

        .empty {
            grid-column: 1 / -1;
            padding: 65px 20px;
            background: #1b1b1b;
            color: #aaa;
            border: 1px dashed #444;
            border-radius: 15px;
            text-align: center;
        }

        .empty i {
            margin-bottom: 15px;
            color: #ff9800;
            font-size: 45px;
        }

        footer {
            padding: 30px 15px;
            background: #171717;
            color: #888;
            border-top: 1px solid #303030;
            font-size: 12px;
            text-align: center;
        }

        footer span {
            color: #ff9800;
        }

        @media (max-width: 900px) {
            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 0 18px;
            }

            nav a {
                margin-left: 10px;
                font-size: 11px;
            }

            .products {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 40px 17px;
            }

            .hero {
                padding: 45px 22px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">RESTAURANT<span>.</span></div>
        <div>
            <a href="{{ route('inicio') }}">Inicio</a>
            <a href="{{ route('menu') }}" class="active">Menú</a>
            <a href="{{ route('nosotros') }}">Nosotros</a>
            <a href="{{ route('reservaciones') }}">Reservas</a>
            <a href="{{ route('contacto') }}">Contacto</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <small>DESCUBRE NUESTROS SABORES</small>
            <h1>Un menú lleno de <span>experiencias.</span></h1>
            <p>Ingredientes seleccionados, preparaciones especiales y sabores que te encantarán.</p>
        </div>
    </section>

    <main class="container">
        <div class="section-heading">
            <small>NUESTRA CARTA</small>
            <h2>Explora nuestro menú</h2>
            <p style="color:#888;font-size:13px;margin-top:8px;">
                Descubre todos nuestros platos disponibles.
            </p>
        </div>

        <div class="filters">
            <button type="button" class="filter-btn active" data-category="todos">Todos</button>
            @foreach ($productos->pluck('categoria')->unique() as $categoria)
                <button type="button" class="filter-btn" data-category="{{ $categoria }}">
                    {{ $categoria }}
                </button>
            @endforeach
        </div>

        <section class="products">
            @forelse ($productos as $producto)
                <article class="card" data-category="{{ $producto->categoria }}">
                    @if ($producto->imagen)
                        <div class="photo">
                            <img src="{{ str_starts_with($producto->imagen, 'https://') ? $producto->imagen : asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                        </div>
                    @else
                        <div class="photo-placeholder"><i class="fas fa-utensils"></i></div>
                    @endif

                    <div class="info">
                        <span class="category">{{ $producto->categoria }}</span>
                        <h3>{{ $producto->nombre }}</h3>
                        <p class="description">
                            {{ $producto->descripcion ?: 'Una deliciosa preparación de nuestro restaurante.' }}
                        </p>
                        <div class="bottom">
                            <div class="price">Bs. {{ number_format((float) $producto->precio, 2) }}</div>
                        </div>
                        <button
                            type="button"
                            class="add-cart"
                            data-id="{{ $producto->id }}"
                            data-name="{{ $producto->nombre }}"
                            data-price="{{ $producto->precio }}"
                        >
                            <i class="fas fa-cart-plus"></i>
                            AGREGAR AL CARRITO
                        </button>
                    </div>
                </article>
            @empty
                <div class="empty">
                    <i class="fas fa-utensils"></i>
                    <h3>Próximamente nuestro menú</h3>
                    <p style="margin-top:8px;font-size:13px;">
                        Estamos preparando deliciosos platos para ti.
                    </p>
                </div>
            @endforelse
        </section>
    </main>

    <button type="button" class="cart-floating" id="openCart">
        <i class="fas fa-shopping-cart"></i>
        MI CARRITO
        <span class="cart-count" id="cartCount">0</span>
    </button>

    <div class="cart-modal" id="cartModal" aria-hidden="true">
        <section class="cart-content" role="dialog" aria-modal="true" aria-labelledby="cartTitle">
            <div class="cart-header">
                <h2 id="cartTitle"><i class="fas fa-shopping-cart"></i> Mi pedido</h2>
                <button type="button" class="cart-close" id="closeCart" aria-label="Cerrar carrito">×</button>
            </div>
            <div id="cartItems"></div>
            <div class="customer-form">
                <h3 style="margin:20px 0 15px;">
                    <i class="fas fa-user" style="color:#ff9800;"></i>
                    Datos del cliente
                </h3>

                <label for="clienteNombre">Nombre completo *</label>
                <input type="text" id="clienteNombre" placeholder="Ingresa tu nombre completo" required>

                <label for="clienteTelefono">Teléfono de contacto *</label>
                <input type="tel" id="clienteTelefono" placeholder="Ej. 70000000" required>

                <label for="tipoPedido">Tipo de pedido *</label>
                <select id="tipoPedido">
                    <option value="Entrega a domicilio">Entrega a domicilio</option>
                    <option value="Recojo en restaurante">Recojo en restaurante</option>
                </select>

                <div id="campoDireccion">
                    <label for="clienteDireccion">Dirección de entrega *</label>
                    <input type="text" id="clienteDireccion" placeholder="Barrio, calle, número de casa" required>
                </div>

                <label for="clienteObservaciones">Observaciones</label>
                <textarea id="clienteObservaciones" placeholder="Ej. Sin cebolla, enviar cubiertos..." rows="3"></textarea>
            </div>
            <div class="cart-total">
                <span>Total:</span>
                <span id="cartTotal">Bs. 0.00</span>
            </div>
            <button type="button" class="whatsapp-btn" id="sendWhatsApp">
                <i class="fab fa-whatsapp"></i>
                ENVIAR PEDIDO POR WHATSAPP
            </button>
        </section>
    </div>

    <footer>
        © {{ date('Y') }} <span>Restaurante Premium</span> · Todos los derechos reservados.
    </footer>

    <script>
        const filterButtons = document.querySelectorAll('.filter-btn');
        const productCards = document.querySelectorAll('.card');

        filterButtons.forEach((button) => {
            button.addEventListener('click', () => {
                filterButtons.forEach((item) => item.classList.remove('active'));
                button.classList.add('active');

                const category = button.dataset.category;
                productCards.forEach((card) => {
                    card.hidden = category !== 'todos' && card.dataset.category !== category;
                });
            });
        });

        const cartKey = 'carritoRestaurante';
        const savedCart = JSON.parse(localStorage.getItem(cartKey) || '[]');

        if (!Array.isArray(savedCart)) {
            throw new TypeError('El carrito guardado debe ser una lista.');
        }

        let carrito = savedCart.filter((item) => (
            item &&
            typeof item.nombre === 'string' &&
            Number.isFinite(Number(item.precio)) &&
            Number(item.precio) > 0 &&
            Number.isInteger(Number(item.cantidad)) &&
            Number(item.cantidad) > 0
        )).map((item) => ({
            id: Number.isInteger(Number(item.id)) && Number(item.id) > 0
                ? Number(item.id)
                : null,
            nombre: item.nombre,
            precio: Number(item.precio),
            cantidad: Number(item.cantidad)
        }));

        if (carrito.length !== savedCart.length) {
            console.error('Se descartaron elementos inválidos del carrito guardado.');
            localStorage.setItem(cartKey, JSON.stringify(carrito));
        }

        const cartModal = document.getElementById('cartModal');
        const cartItems = document.getElementById('cartItems');
        const tipoPedido = document.getElementById('tipoPedido');
        const campoDireccion = document.getElementById('campoDireccion');
        const clienteDireccion = document.getElementById('clienteDireccion');

        function guardarCarrito() {
            localStorage.setItem(cartKey, JSON.stringify(carrito));
            actualizarCarrito();
        }

        function agregarAlCarrito(id, nombre, precio) {
            const productoExistente = carrito.find((item) => item.id === id);

            if (productoExistente) {
                productoExistente.cantidad++;
            } else {
                carrito.push({ id, nombre, precio, cantidad: 1 });
            }

            guardarCarrito();
            alert(nombre + ' agregado al carrito.');
        }

        function escaparHTML(texto) {
            return String(texto).replace(/[&<>"']/g, (letra) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            })[letra]);
        }

        function actualizarCarrito() {
            const contador = document.getElementById('cartCount');
            const totalElemento = document.getElementById('cartTotal');
            let total = 0;
            let cantidadTotal = 0;

            cartItems.innerHTML = '';

            if (carrito.length === 0) {
                cartItems.innerHTML = '<div class="cart-empty">Tu carrito está vacío.</div>';
            }

            carrito.forEach((item, index) => {
                const subtotal = item.precio * item.cantidad;
                total += subtotal;
                cantidadTotal += item.cantidad;

                cartItems.innerHTML += `
                    <div class="cart-item">
                        <div>
                            <strong>${escaparHTML(item.nombre)}</strong>
                            <p class="cart-item-price">
                                ${item.cantidad} x Bs. ${item.precio.toFixed(2)}
                            </p>
                            <strong class="cart-subtotal">
                                Bs. ${subtotal.toFixed(2)}
                            </strong>
                        </div>
                        <div class="cart-item-actions">
                            <button type="button" data-action="decrease" data-index="${index}" aria-label="Reducir cantidad">−</button>
                            <button type="button" data-action="increase" data-index="${index}" aria-label="Aumentar cantidad">+</button>
                            <button type="button" data-action="remove" data-index="${index}" aria-label="Eliminar producto">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
            });

            contador.textContent = cantidadTotal;
            totalElemento.textContent = 'Bs. ' + total.toFixed(2);
        }

        function cambiarCantidad(index, cambio) {
            const producto = carrito[index];

            if (!producto) {
                return;
            }

            producto.cantidad += cambio;

            if (producto.cantidad <= 0) {
                carrito.splice(index, 1);
            }

            guardarCarrito();
        }

        function eliminarProducto(index) {
            if (index >= 0 && index < carrito.length) {
                carrito.splice(index, 1);
                guardarCarrito();
            }
        }

        function abrirCarrito() {
            cartModal.classList.add('show');
            cartModal.setAttribute('aria-hidden', 'false');
            actualizarCarrito();
        }

        function cerrarCarrito() {
            cartModal.classList.remove('show');
            cartModal.setAttribute('aria-hidden', 'true');
        }

        function actualizarDireccion() {
            const requiereEntrega = tipoPedido.value === 'Entrega a domicilio';
            campoDireccion.style.display = requiereEntrega ? 'block' : 'none';
            clienteDireccion.required = requiereEntrega;

            if (!requiereEntrega) {
                clienteDireccion.value = '';
            }
        }

        async function enviarWhatsApp() {
            if (carrito.length === 0) {
                alert('Tu carrito está vacío.');
                return;
            }

            const nombre = document.getElementById('clienteNombre').value.trim();
            const telefono = document.getElementById('clienteTelefono').value.trim();
            const tipo = tipoPedido.value;
            const direccion = clienteDireccion.value.trim();
            const observaciones = document.getElementById('clienteObservaciones').value.trim();

            if (!nombre || !telefono) {
                alert('Completa tu nombre y teléfono.');
                return;
            }

            if (tipo === 'Entrega a domicilio' && !direccion) {
                alert('Ingresa tu dirección de entrega.');
                return;
            }

            if (carrito.some((item) => !Number.isInteger(item.id) || item.id < 1)) {
                alert('Quita y vuelve a agregar los productos antiguos del carrito para actualizarlos.');
                return;
            }

            const ventana = window.open('about:blank', '_blank');

            if (!ventana) {
                alert('Permite las ventanas emergentes para continuar con WhatsApp.');
                return;
            }

            const botonEnviar = document.getElementById('sendWhatsApp');
            botonEnviar.disabled = true;

            try {
                const respuesta = await fetch("{{ route('pedidos.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        nombre_cliente: nombre,
                        telefono: telefono,
                        tipo_pedido: tipo,
                        direccion: direccion,
                        observaciones: observaciones,
                        productos: carrito.map((item) => ({
                            producto_id: item.id,
                            cantidad: item.cantidad
                        }))
                    })
                });

                const resultado = await respuesta.json();

                if (!respuesta.ok) {
                    const validationMessage = resultado.errors
                        ? Object.values(resultado.errors).flat()[0]
                        : null;

                    throw new Error(validationMessage || resultado.message || 'No se pudo registrar el pedido.');
                }

                let mensaje = '🍗 *NUEVO PEDIDO - RESTAURANTE*\n';
                mensaje += '━━━━━━━━━━━━━━━━━━\n';
                mensaje += `🧾 Pedido: #${resultado.pedido_id}\n`;
                mensaje += `👤 Cliente: ${nombre}\n`;
                mensaje += `📱 Teléfono: ${telefono}\n`;
                mensaje += `🚚 Tipo: ${tipo}\n`;

                if (tipo === 'Entrega a domicilio') {
                    mensaje += `📍 Dirección: ${direccion}\n`;
                }

                mensaje += '\n🛒 *PRODUCTOS:*\n';

                resultado.productos.forEach((producto) => {
                    mensaje += `• ${producto.nombre}\n`;
                    mensaje += `  ${producto.cantidad} x Bs. ${Number(producto.precio).toFixed(2)} = Bs. ${Number(producto.subtotal).toFixed(2)}\n`;
                });

                mensaje += `\n💰 *TOTAL: Bs. ${Number(resultado.total).toFixed(2)}*\n`;

                if (observaciones) {
                    mensaje += `📝 Observaciones: ${observaciones}\n`;
                }

                mensaje += '\n¡Gracias por tu pedido!';

                const url = 'https://wa.me/59169688471?text=' + encodeURIComponent(mensaje);

                ventana.opener = null;
                ventana.location.href = url;

                alert('¡Pedido registrado correctamente! Ahora envíalo por WhatsApp.');
            } catch (error) {
                if (!ventana.closed) {
                    ventana.close();
                }

                alert(error instanceof Error ? error.message : 'No se pudo registrar el pedido.');
            } finally {
                botonEnviar.disabled = false;
            }
        }

        document.querySelectorAll('.add-cart').forEach((button) => {
            button.addEventListener('click', () => {
                agregarAlCarrito(
                    Number(button.dataset.id),
                    button.dataset.name,
                    Number(button.dataset.price)
                );
            });
        });

        cartItems.addEventListener('click', (event) => {
            const button = event.target.closest('button[data-action]');

            if (!button) {
                return;
            }

            const index = Number(button.dataset.index);

            if (button.dataset.action === 'decrease') {
                cambiarCantidad(index, -1);
            } else if (button.dataset.action === 'increase') {
                cambiarCantidad(index, 1);
            } else if (button.dataset.action === 'remove') {
                eliminarProducto(index);
            }
        });

        document.getElementById('openCart').addEventListener('click', abrirCarrito);
        document.getElementById('closeCart').addEventListener('click', cerrarCarrito);
        document.getElementById('sendWhatsApp').addEventListener('click', enviarWhatsApp);
        tipoPedido.addEventListener('change', actualizarDireccion);

        cartModal.addEventListener('click', (event) => {
            if (event.target === cartModal) {
                cerrarCarrito();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                cerrarCarrito();
            }
        });

        actualizarCarrito();
        actualizarDireccion();
    </script>
    @include('restaurante.partials.chatbot')
</body>
</html>