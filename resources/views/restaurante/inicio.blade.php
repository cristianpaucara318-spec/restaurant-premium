
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Restaurant Premium | Gastronomía</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --orange: #ff8b20;
            --gold: #ffc477;
            --dark: #10100f;
            --card: #1c1b19;
            --white: #ffffff;
            --muted: #aaa7a1;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--dark);
            color: white;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* NAVEGACIÓN */

        header {
            height: 82px;
            padding: 0 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #11110f;
            border-bottom: 1px solid #ffffff12;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 23px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .logo span {
            color: var(--orange);
        }

        nav {
            display: flex;
            gap: 35px;
        }

        nav a {
            color: #ddd;
            font-size: 13px;
            transition: .3s;
        }

        nav a:hover {
            color: var(--orange);
        }

        .header-button {
            padding: 14px 24px;
            border-radius: 30px;
            background: linear-gradient(135deg, #ffad3d, #ed7100);
            color: white;
            font-size: 13px;
            font-weight: 800;
            box-shadow: 0 7px 25px #ff8b2040;
            transition: .3s;
        }

        .header-button:hover {
            transform: translateY(-4px);
        }

        /* PORTADA */

        .hero {
            min-height: 650px;
            padding: 80px 7%;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(90deg, #10100f 5%, #10100fe8 38%, #10100f65 75%, #10100f25),
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1800') center/cover;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, #10100f 0%, transparent 25%, transparent 85%, #10100f50);
            pointer-events: none;
        }

        .hero-content {
            max-width: 620px;
            position: relative;
            z-index: 2;
            animation: aparecer 1s ease;
        }

        .eyebrow {
            color: var(--orange);
            letter-spacing: 5px;
            font-size: 12px;
            font-weight: 900;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(48px, 6vw, 82px);
            line-height: 1.07;
            margin-bottom: 25px;
        }

        .hero h1 span {
            color: var(--orange);
        }

        .hero p {
            max-width: 480px;
            color: #d1cec9;
            font-size: 14px;
            line-height: 2;
            margin-bottom: 35px;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .primary-button {
            padding: 17px 28px;
            border-radius: 35px;
            display: inline-block;
            color: white;
            font-size: 13px;
            font-weight: 800;
            background: linear-gradient(135deg, #ffa32d, #ed7100);
            box-shadow: 0 12px 30px #ff8b2040;
            transition: .3s;
        }

        .primary-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px #ff8b2070;
        }

        .secondary-button {
            color: white;
            font-size: 13px;
            border-bottom: 1px solid var(--orange);
            padding-bottom: 6px;
        }

        .hero-food {
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
            width: min(390px, 32vw);
            aspect-ratio: 1;
            border-radius: 50%;
            border: 8px solid #ffffff25;
            overflow: hidden;
            box-shadow: 0 30px 80px #000b, 0 0 50px #ff8b2020;
            z-index: 2;
            animation: flotar 5s ease-in-out infinite;
        }

        .hero-food img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* INFORMACIÓN RÁPIDA */

        .features {
            padding: 28px 7%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            background: #171614;
            border-top: 1px solid #ffffff0d;
            border-bottom: 1px solid #ffffff0d;
        }

        .feature {
            text-align: center;
            padding: 10px;
        }

        .feature strong {
            color: var(--orange);
            font-size: 14px;
            display: block;
            margin-bottom: 7px;
        }

        .feature span {
            font-size: 11px;
            color: var(--muted);
        }

        /* SECCIONES */

        .section {
            padding: 100px 7%;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-heading small {
            color: var(--orange);
            letter-spacing: 5px;
            font-weight: 900;
            font-size: 11px;
        }

        .section-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 4vw, 48px);
            margin: 15px 0;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 13px;
        }

        /* PLATOS */

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .food-card {
            background: linear-gradient(145deg, #25231f, #171614);
            border: 1px solid #ffffff12;
            border-radius: 22px;
            overflow: hidden;
            transition: .4s;
            box-shadow: 0 15px 35px #0004;
        }

        .food-card:hover {
            transform: translateY(-12px) perspective(900px) rotateX(2deg);
            border-color: #ff8b2070;
            box-shadow: 0 25px 50px #0009;
        }

        .food-image {
            height: 245px;
            overflow: hidden;
            position: relative;
        }

        .food-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .6s;
        }

        .food-card:hover .food-image img {
            transform: scale(1.1);
        }

        .food-info {
            padding: 25px;
        }

        .food-info h3 {
            font-size: 18px;
            margin-bottom: 12px;
        }

        .food-info p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
            min-height: 43px;
        }

        .food-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 22px;
        }

        .price {
            font-size: 23px;
            font-weight: 900;
            color: var(--orange);
        }

        .add-button {
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 50%;
            background: var(--orange);
            color: white;
            font-size: 25px;
            cursor: pointer;
            transition: .3s;
        }

        .add-button:hover {
            transform: rotate(90deg) scale(1.1);
        }

        /* NOSOTROS */

        .about {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 70px;
            background: #191816;
        }

        .about-image {
            height: 450px;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 15px 15px 0 #ff8b2020;
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-content small {
            color: var(--orange);
            letter-spacing: 4px;
            font-weight: 900;
        }

        .about-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(35px, 4vw, 48px);
            line-height: 1.2;
            margin: 20px 0;
        }

        .about-content p {
            color: #aaa;
            font-size: 13px;
            line-height: 2;
            margin-bottom: 30px;
        }

        /* RESERVAS */

        .reservation {
            text-align: center;
            padding: 85px 20px;
            background:
                linear-gradient(#10100fdc, #10100fdc),
                url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600') center/cover;
        }

        .reservation h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(35px, 5vw, 55px);
            margin: 18px 0;
        }

        .reservation p {
            color: #ccc;
            font-size: 13px;
            margin-bottom: 30px;
        }

        /* FOOTER */

        footer {
            padding: 55px 7% 25px;
            background: #090908;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            padding-bottom: 35px;
        }

        .footer-content p {
            color: #999;
            font-size: 12px;
            line-height: 2;
            margin-top: 12px;
        }

        .footer-bottom {
            border-top: 1px solid #ffffff15;
            padding-top: 22px;
            text-align: center;
            color: #777;
            font-size: 11px;
        }

        .footer-bottom span {
            color: var(--orange);
        }

        /* ANIMACIONES */

        @keyframes flotar {
            0%, 100% { transform: translateY(-50%); }
            50% { transform: translateY(calc(-50% - 15px)); }
        }

        @keyframes aparecer {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* RESPONSIVE */

        @media(max-width: 1000px) {
            .hero-food {
                right: 5%;
                width: 32vw;
            }

            .hero-content {
                max-width: 55%;
            }

            .menu-grid {
                gap: 15px;
            }
        }

        @media(max-width: 750px) {
            header {
                height: auto;
                padding: 20px 5%;
                flex-wrap: wrap;
                gap: 20px;
            }

            nav {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 18px;
                flex-wrap: wrap;
            }

            .hero {
                min-height: 760px;
                padding: 70px 6%;
                text-align: center;
                justify-content: center;
            }

            .hero-content {
                max-width: 100%;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-actions {
                justify-content: center;
            }

            .hero-food {
                position: relative;
                top: auto;
                right: auto;
                transform: none;
                width: 250px;
                margin-top: 50px;
            }

            .hero {
                flex-direction: column;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .about {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-image {
                height: 300px;
            }

            .section {
                padding: 70px 6%;
            }
        }

        @media(prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation: none !important;
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

<header>
    <a href="{{ route('inicio') }}" class="logo">
        RESTAURANT<span>.</span>
    </a>

    <nav>
        <a href="{{ route('inicio') }}">Inicio</a>
        <a href="{{ route('menu') }}">Menú</a>
        <a href="{{ route('nosotros') }}">Nosotros</a>
        <a href="{{ route('reservaciones') }}">Reservaciones</a>
    </nav>

    <a href="{{ route('reservaciones') }}" class="header-button">
        Reservar mesa
    </a>
</header>

<!-- PORTADA -->

<section class="hero" id="inicio">

    <div class="hero-content">
        <div class="eyebrow">EXPERIENCIA GASTRONÓMICA</div>

        <h1>
            El sabor que<br>
            merece ser <span>vivido.</span>
        </h1>

        <p>
            Descubre una experiencia gastronómica única.
            Ingredientes seleccionados, sabores extraordinarios
            y momentos especiales que merecen repetirse.
        </p>

        <div class="hero-actions">
            <a href="{{ route('menu') }}" class="primary-button">
                Descubrir nuestro menú →
            </a>

            <a href="#nosotros" class="secondary-button">
                Conocer el restaurante
            </a>
        </div>
    </div>

    <div class="hero-food">
        <img
            src="https://images.unsplash.com/photo-1547592180-85f173990554?w=900"
            alt="Plato especial del restaurante">
    </div>

</section>

<!-- CARACTERÍSTICAS -->

<section class="features">
    <div class="feature">
        <strong>✦ Ingredientes frescos</strong>
        <span>Productos seleccionados cada día</span>
    </div>

    <div class="feature">
        <strong>✦ Cocina especializada</strong>
        <span>Preparación con calidad y dedicación</span>
    </div>

    <div class="feature">
        <strong>✦ Atención especial</strong>
        <span>Una experiencia para recordar</span>
    </div>
</section>

<!-- MENÚ -->

<section class="section" id="menu">

    <div class="section-heading">
        <small>NUESTRA ESPECIALIDAD</small>
        <h2>Sabores que enamoran</h2>
        <p>Descubre algunos de nuestros platos favoritos.</p>
    </div>

    <div class="menu-grid">

        <article class="food-card">
            <div class="food-image">
                <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=800" alt="Hamburguesa">
            </div>

            <div class="food-info">
                <h3>Hamburguesa Premium</h3>
                <p>Carne especial, queso, vegetales frescos y salsa de la casa.</p>

                <div class="food-bottom">
                    <div class="price">Bs. 35</div>
                    <button class="add-button" onclick="agregar('Hamburguesa Premium',35)">+</button>
                </div>
            </div>
        </article>

        <article class="food-card">
            <div class="food-image">
                <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800" alt="Pizza">
            </div>

            <div class="food-info">
                <h3>Pizza Especial</h3>
                <p>Masa artesanal, queso fundido e ingredientes seleccionados.</p>

                <div class="food-bottom">
                    <div class="price">Bs. 55</div>
                    <button class="add-button" onclick="agregar('Pizza Especial',55)">+</button>
                </div>
            </div>
        </article>

        <article class="food-card">
            <div class="food-image">
                <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=800" alt="Parrilla">
            </div>

            <div class="food-info">
                <h3>Parrilla Gourmet</h3>
                <p>Corte seleccionado acompañado de guarniciones especiales.</p>

                <div class="food-bottom">
                    <div class="price">Bs. 65</div>
                    <button class="add-button" onclick="agregar('Parrilla Gourmet',65)">+</button>
                </div>
            </div>
        </article>

    </div>
</section>

<!-- NOSOTROS -->

<section class="section about" id="nosotros">

    <div class="about-image">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1000" alt="Interior del restaurante">
    </div>

    <div class="about-content">
        <small>NUESTRA HISTORIA</small>

        <h2>Más que comida, creamos experiencias.</h2>

        <p>
            Nuestro restaurante combina calidad, creatividad y
            pasión por la gastronomía. Cada plato está preparado
            con dedicación para ofrecerte momentos inolvidables.
        </p>

        <a href="#reservas" class="primary-button">
            Ven a conocernos →
        </a>
    </div>

</section>

<!-- RESERVACIONES -->

<section class="reservation" id="reservas">

    <small class="eyebrow">UNA EXPERIENCIA ESPECIAL</small>

    <h2>Tu mesa te está esperando.</h2>

    <p>
        Comparte buenos momentos y disfruta de nuestros mejores sabores.
    </p>

    <a href="https://wa.me/" class="primary-button">
        Reservar por WhatsApp →
    </a>

</section>

<!-- PIE DE PÁGINA -->

<footer id="contacto">

    <div class="footer-content">

        <div>
            <a href="#inicio" class="logo">
                RESTAURANT<span>.</span>
            </a>

            <p>
                Gastronomía, calidad y momentos especiales.<br>
                Santa Cruz, Bolivia.
            </p>
        </div>

        <div>
            <strong>Explorar</strong>
            <p>
                <a href="#inicio" style="color:#999">Inicio</a><br>
                <a href="#menu" style="color:#999">Nuestro menú</a><br>
                <a href="#nosotros" style="color:#999">Nosotros</a>
            </p>
        </div>

        <div>
            <strong>Contacto</strong>
            <p>
                Santa Cruz, Bolivia<br>
                Horario: próximamente<br>
                Pedidos y reservas
            </p>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 <span>RESTAURANT PREMIUM</span> · Todos los derechos reservados.
    </div>

</footer>

<script>
    let carrito = [];

    function agregar(nombre, precio) {
        carrito.push({ nombre, precio });

        const total = carrito.reduce(
            (suma, producto) => suma + producto.precio,
            0
        );

        alert(
            nombre + ' agregado al pedido.\n\n' +
            'Productos: ' + carrito.length + '\n' +
            'Total: Bs. ' + total
        );
    }
</script>

@include('restaurante.partials.chatbot')
</body>
</html>
