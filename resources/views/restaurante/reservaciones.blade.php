<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones | Restaurant Premium</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #10100f;
            color: #fff;
        }

        :root {
            --gold: #d9ad55;
            --gold-light: #f3d28b;
            --dark: #171715;
            --panel: #20201d;
            --green: #39bd83;
            --red: #e65e5e;
        }

        header {
            height: 85px;
            padding: 0 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #151513;
            border-bottom: 1px solid #343027;
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: 2px;
            color: white;
        }

        .logo span {
            color: var(--gold);
        }

        nav {
            display: flex;
            gap: 28px;
        }

        nav a {
            text-decoration: none;
            color: #ccc;
            font-size: 14px;
            transition: .3s;
        }

        nav a:hover {
            color: var(--gold);
        }

        .hero {
            text-align: center;
            padding: 55px 20px 35px;
        }

        .etiqueta {
            color: var(--gold);
            letter-spacing: 4px;
            font-size: 11px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(34px, 5vw, 52px);
            font-weight: 400;
            margin-bottom: 12px;
        }

        .hero h1 span {
            color: var(--gold-light);
        }

        .hero p {
            color: #aaa;
            font-size: 14px;
        }

        .contenedor {
            width: 92%;
            max-width: 1450px;
            margin: auto;
            padding-bottom: 70px;
        }

        .pasos {
            display: flex;
            justify-content: center;
            gap: 45px;
            margin: 20px 0 35px;
            flex-wrap: wrap;
        }

        .paso {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #777;
            font-size: 13px;
        }

        .paso-numero {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            border: 1px solid #665633;
            color: var(--gold);
        }

        .paso.activo {
            color: white;
        }

        .paso.activo .paso-numero {
            background: var(--gold);
            color: #17130c;
        }

        .selector-fecha {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 35px;
        }

        .selector-fecha input {
            background: #20201d;
            border: 1px solid #494234;
            color: white;
            padding: 13px 18px;
            border-radius: 9px;
            outline: none;
        }

        .selector-fecha label {
            color: #bbb;
            font-size: 12px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .titulo-seccion {
            margin-bottom: 20px;
        }

        .titulo-seccion h2 {
            font-family: Georgia, serif;
            font-size: 26px;
            font-weight: 400;
        }

        .titulo-seccion p {
            color: #888;
            font-size: 13px;
            margin-top: 7px;
        }

        .ambientes {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .ambiente {
            padding: 18px;
            border: 1px solid #38352d;
            border-radius: 12px;
            background: #1b1b18;
            color: white;
            text-align: left;
            cursor: pointer;
            transition: .3s;
        }

        .ambiente:hover,
        .ambiente.activo {
            border-color: var(--gold);
            background: #29251b;
        }

        .ambiente .emoji {
            font-size: 25px;
            display: block;
            margin-bottom: 10px;
        }

        .ambiente strong {
            display: block;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .ambiente small {
            color: #999;
            font-size: 12px;
        }

        .zona-principal {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(300px, .8fr);
            gap: 25px;
            align-items: start;
        }

        .plano {
            background: #1b1b18;
            border: 1px solid #39352c;
            border-radius: 17px;
            padding: 22px;
            overflow: hidden;
        }

        .plano-cabecera {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
        }

        .plano-cabecera h3 {
            font-size: 15px;
            font-weight: 500;
        }

        .plano-cabecera span {
            color: var(--gold);
            font-size: 11px;
            letter-spacing: 1px;
        }

        /* ===== PLANO REALISTA DEL RESTAURANTE ===== */

        .sala {
            position: relative;
            min-height: 680px;
            padding: 180px 35px 70px;
            overflow: hidden;
            border: 9px solid #796044;
            border-radius: 18px;
            background-color: #544638;
            background-image:
                linear-gradient(90deg, #ffffff08 1px, transparent 1px),
                linear-gradient(#ffffff08 1px, transparent 1px),
                linear-gradient(135deg, #594b3a, #302b25);
            background-size: 35px 35px, 35px 35px, cover;
            box-shadow:
                inset 0 0 45px #000b,
                0 18px 35px #0009;
            transition: background .4s;
        }

        /* Salón interior */
        .sala[data-ambiente="interior"] {
            background:
                radial-gradient(ellipse at center, #76604455, transparent 70%),
                repeating-linear-gradient(90deg, #604b35 0 35px, #70583e 36px 38px);
        }

        /* Terraza */
        .sala[data-ambiente="terraza"] {
            background:
                radial-gradient(circle at 10% 15%, #39814b99 0 45px, transparent 48px),
                radial-gradient(circle at 90% 20%, #39814b99 0 45px, transparent 48px),
                radial-gradient(circle at 10% 85%, #39814b99 0 45px, transparent 48px),
                radial-gradient(circle at 90% 85%, #39814b99 0 45px, transparent 48px),
                repeating-linear-gradient(45deg, #53694a 0 18px, #617b55 19px 36px);
        }

        /* Salón privado */
        .sala[data-ambiente="privado"] {
            background:
                radial-gradient(ellipse at center, #72552f66, transparent 70%),
                repeating-linear-gradient(90deg, #49352c 0 30px, #594233 31px 33px);
        }

        /* Nombre del ambiente */
        .rotulo {
            position: absolute;
            top: 22px;
            left: 50%;
            transform: translateX(-50%);
            color: #f3d28b;
            font-size: 14px;
            letter-spacing: 5px;
            white-space: nowrap;
            text-shadow: 0 3px 8px #000;
            z-index: 5;
        }

        /* Barra superior */
        .barra-restaurante {
            position: absolute;
            top: 65px;
            left: 50%;
            transform: translateX(-50%);
            padding: 12px 35px;
            border: 2px solid #c39a58;
            border-radius: 8px;
            color: #ffe5a7;
            background: linear-gradient(145deg, #65452a, #291c13);
            box-shadow: 0 8px 15px #0009, inset 0 2px 5px #fff3;
            font-size: 11px;
            letter-spacing: 4px;
            white-space: nowrap;
            z-index: 4;
        }

        /* Decoración */
        .decoracion {
            position: absolute;
            top: 70px;
            font-size: 38px;
            filter: drop-shadow(0 6px 5px #0009);
            z-index: 4;
        }

        .decoracion-izquierda { left: 25px; }
        .decoracion-derecha { right: 25px; }

        /* Distribución */
        .mesas-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 45px 15px;
            align-items: center;
            justify-items: center;
            padding: 15px 5px;
            position: relative;
            z-index: 2;
        }

        /* Botón completo de cada mesa */
        .mesa {
            width: 100%;
            min-height: 145px;
            border: none;
            background: transparent;
            color: white;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: .3s;
        }

        .mesa:hover:not(:disabled) {
            transform: translateY(-5px);
        }

        /* Mueble de madera */
        .mesa-mueble {
            position: relative;
            display: grid;
            place-items: center;
            color: #fff0c7;
            background:
                radial-gradient(ellipse at 30% 25%, #d9b77b, transparent 45%),
                linear-gradient(145deg, #a9773d, #694321 65%, #402819);
            border: 4px solid #d6b477;
            box-shadow:
                0 9px 0 #382316,
                0 15px 22px #000b,
                inset 0 4px 8px #fff6,
                inset 0 -6px 10px #0007;
            z-index: 2;
            transition: .3s;
        }

        /* Mesa para 2 personas */
        .cap-2 .mesa-mueble {
            width: 76px;
            height: 76px;
            border-radius: 50%;
        }

        /* Mesa para 4 personas */
        .cap-4 .mesa-mueble {
            width: 92px;
            height: 82px;
            border-radius: 13px;
        }

        /* Mesa para 6 personas */
        .cap-6 .mesa-mueble {
            width: 112px;
            height: 86px;
            border-radius: 14px;
        }

        /* Mesa para 8 personas */
        .cap-8 .mesa-mueble {
            width: 128px;
            height: 95px;
            border-radius: 15px;
        }

        /* Sillas superiores e inferiores */
        .mesa-mueble::before,
        .mesa-mueble::after {
            content: "";
            position: absolute;
            width: 24px;
            height: 20px;
            background: linear-gradient(145deg, #e5d5b1, #9c8258);
            border: 3px solid #665238;
            border-radius: 7px;
            box-shadow: 0 4px 5px #0008;
            z-index: -1;
        }

        .mesa-mueble::before {
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
        }

        .mesa-mueble::after {
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Sillas laterales */
        .cap-4 .mesa-mueble,
        .cap-6 .mesa-mueble,
        .cap-8 .mesa-mueble {
            isolation: isolate;
        }

        .cap-4 .mesa-mueble {
            box-shadow:
                0 9px 0 #382316,
                0 15px 22px #000b,
                inset 0 4px 8px #fff6,
                inset 0 -6px 10px #0007,
                -31px 0 0 -5px #bca17a,
                31px 0 0 -5px #bca17a;
        }

        .cap-6 .mesa-mueble {
            box-shadow:
                0 9px 0 #382316,
                0 15px 22px #000b,
                inset 0 4px 8px #fff6,
                inset 0 -6px 10px #0007,
                -45px 0 0 -5px #bca17a,
                45px 0 0 -5px #bca17a;
        }

        .cap-8 .mesa-mueble {
            box-shadow:
                0 9px 0 #382316,
                0 15px 22px #000b,
                inset 0 4px 8px #fff6,
                inset 0 -6px 10px #0007,
                -52px 0 0 -5px #bca17a,
                52px 0 0 -5px #bca17a;
        }

        /* Número */
        .mesa-numero {
            font-size: 21px;
            font-weight: 900;
            text-shadow: 0 3px 5px #0009;
        }

        /* Información */
        .mesa-info {
            margin-top: 22px;
            padding: 7px 12px;
            text-align: center;
            border: 1px solid #b99a61;
            border-radius: 7px;
            background: #191510eF;
            box-shadow: 0 5px 10px #0008;
        }

        .mesa-info strong {
            display: block;
            color: #f3d28b;
            font-size: 12px;
        }

        .mesa-info small {
            color: #ddd;
            font-size: 10px;
        }

        /* Seleccionada */
        .mesa.seleccionada .mesa-mueble {
            background: linear-gradient(145deg, #ffe5a0, #b17b25);
            border-color: #fff2c6;
            box-shadow:
                0 9px 0 #78511c,
                0 0 30px #f1c45c,
                inset 0 4px 8px #fff9;
            transform: scale(1.12);
        }

        /* Ocupada */
        .mesa.ocupada .mesa-mueble {
            background: linear-gradient(145deg, #d56b6b, #762727);
            border-color: #ffaaaa;
            box-shadow:
                0 9px 0 #481818,
                0 12px 20px #0009;
        }

        .mesa.ocupada {
            cursor: not-allowed;
            opacity: .7;
        }

        .mesa:disabled {
            cursor: not-allowed;
        }

        /* Entrada */
        .sala::before {
            content: "ENTRADA PRINCIPAL";
            position: absolute;
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%);
            padding: 9px 25px;
            border: 1px solid #d0ad70;
            border-radius: 5px;
            background: #171510;
            color: #f3d28b;
            font-size: 10px;
            letter-spacing: 3px;
            z-index: 4;
        }

        /* Móviles */
        @media(max-width: 600px) {
            .sala {
                min-height: 570px;
                padding: 160px 5px 65px;
            }

            .mesas-grid {
                gap: 35px 3px;
            }

            .cap-8 .mesa-mueble {
                width: 76px;
            }

            .cap-6 .mesa-mueble {
                width: 72px;
            }

            .cap-4 .mesa-mueble {
                width: 65px;
            }

            .mesa-info {
                padding: 5px;
            }

            .barra-restaurante {
                padding: 9px 15px;
                font-size: 9px;
            }
        }

        .leyenda {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 22px;
            color: #aaa;
            font-size: 11px;
        }

        .leyenda span {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .punto {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .punto.verde { background: var(--green); }
        .punto.dorado { background: var(--gold); }
        .punto.rojo { background: var(--red); }

        .formulario {
            background: #1b1b18;
            border: 1px solid #39352c;
            border-radius: 17px;
            padding: 25px;
        }

        .formulario h2 {
            font-family: Georgia, serif;
            font-size: 25px;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .formulario .subtitulo {
            color: #999;
            font-size: 12px;
            margin-bottom: 22px;
        }

        .mesa-resumen {
            background: #2b281f;
            border: 1px solid #665633;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 22px;
            color: var(--gold-light);
            font-size: 13px;
        }

        .campo {
            margin-bottom: 15px;
        }

        .campo label {
            display: block;
            font-size: 12px;
            color: #bbb;
            margin-bottom: 8px;
        }

        .campo input,
        .campo select,
        .campo textarea {
            width: 100%;
            background: #11110f;
            color: white;
            border: 1px solid #454136;
            border-radius: 8px;
            padding: 13px;
            outline: none;
            font-family: inherit;
        }

        .campo input:focus,
        .campo select:focus,
        .campo textarea:focus {
            border-color: var(--gold);
        }

        .campo textarea {
            resize: vertical;
            min-height: 85px;
        }

        .boton {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(120deg, #b98b39, #f0d18b);
            color: #17130c;
            font-weight: 800;
            cursor: pointer;
            transition: .3s;
        }

        .boton:hover {
            filter: brightness(1.1);
            transform: translateY(-2px);
        }

        #resultado {
            margin-top: 15px;
            font-size: 13px;
            line-height: 1.5;
        }

        footer {
            text-align: center;
            padding: 25px;
            border-top: 1px solid #333;
            color: #777;
            font-size: 12px;
        }

        @media(max-width: 900px) {
            .zona-principal {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 600px) {
            header {
                height: auto;
                padding: 20px;
                flex-direction: column;
                gap: 15px;
            }

            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .ambientes {
                grid-template-columns: 1fr;
            }

            .plano {
                padding: 12px;
            }

            .pasos {
                gap: 15px;
            }
        }

        /* =================================
           DISTRIBUCIÓN DE CADA AMBIENTE
        ================================= */

        /* SALÓN INTERIOR: 6 mesas en 3 columnas */
        .sala[data-ambiente="interior"] .mesas-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 55px 25px;
            padding-top: 25px;
        }

        /* TERRAZA: 3 mesas grandes separadas */
        .sala[data-ambiente="terraza"] .mesas-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 60px 30px;
            padding: 55px 15px;
        }

        /* SALÓN PRIVADO: 2 mesas arriba y una centrada abajo */
        .sala[data-ambiente="privado"] .mesas-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 65px 45px;
            padding: 35px 45px;
        }

        .sala[data-ambiente="privado"] .mesa:last-child {
            grid-column: 1 / -1;
        }

        /* Decoración de terraza */
        .sala[data-ambiente="terraza"] {
            border-color: #567b4c;
            box-shadow:
                inset 0 0 45px #102d18aa,
                0 18px 35px #0009;
        }

        /* Decoración del salón privado */
        .sala[data-ambiente="privado"] {
            border-color: #a17a4c;
            box-shadow:
                inset 0 0 55px #120b08,
                0 18px 35px #0009;
        }

        /* Animación al seleccionar una mesa */
        .mesa.seleccionada .mesa-mueble {
            animation: mesaElegida .45s ease;
        }

        @keyframes mesaElegida {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1.12);
            }
        }

        /* Adaptación para celulares */
        @media(max-width: 600px) {
            .sala[data-ambiente="interior"] .mesas-grid {
                gap: 35px 3px;
            }

            .sala[data-ambiente="terraza"] .mesas-grid {
                gap: 35px 3px;
                padding: 35px 0;
            }

            .sala[data-ambiente="privado"] .mesas-grid {
                gap: 40px 5px;
                padding: 25px 5px;
            }
        }

        /* TARJETA DE MESA SELECCIONADA */

        .mesa-resumen {
            background: linear-gradient(145deg, #29251d, #171612);
            border: 1px solid #80683f;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 20px;
            min-height: 150px;
            box-shadow: 0 8px 20px #0005;
        }

        .vista-mesa {
            width: 125px;
            height: 115px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background:
                radial-gradient(circle, #b89a6255, transparent 70%),
                #211e18;
        }

        .vista-mueble {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            position: relative;
            color: white;
            font-size: 20px;
            font-weight: 900;
            background: linear-gradient(145deg, #d9b477, #70451f);
            border: 4px solid #e5c58b;
            box-shadow:
                0 7px 0 #422b19,
                0 12px 15px #0009,
                inset 0 4px 7px #fff7;
        }

        .vista-mueble::before,
        .vista-mueble::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 15px;
            background: #d7c49e;
            border: 2px solid #75603d;
            border-radius: 5px;
            z-index: -1;
        }

        .vista-mueble::before {
            top: -22px;
        }

        .vista-mueble::after {
            bottom: -22px;
        }

        .datos-mesa {
            min-width: 0;
        }

        .estado-mesa {
            color: #39bd83;
            font-size: 9px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .datos-mesa h3 {
            color: #f3d28b;
            font-size: 19px;
            margin: 7px 0;
        }

        .datos-mesa p {
            color: #bbb;
            font-size: 11px;
            margin-top: 7px;
        }

        @media(max-width: 450px) {
            .mesa-resumen {
                gap: 10px;
                padding: 12px;
            }

            .vista-mesa {
                width: 95px;
            }
        }

    </style>
</head>

<body>

<header>
    <div class="logo">RESTAURANT<span>.</span></div>

    <nav>
        <a href="{{ route('inicio') }}">Inicio</a>
        <a href="{{ route('menu') }}">Menú</a>
        <a href="{{ route('nosotros') }}">Nosotros</a>
        <a href="{{ route('reservaciones') }}">Reservaciones</a>
        <a href="{{ route('contacto') }}">Contacto</a>
    </nav>
</header>

<section class="hero">
    <div class="etiqueta">Una experiencia exclusiva</div>
    <h1>Reserva tu <span>mesa</span></h1>
    <p>Elige tu lugar favorito y disfruta una experiencia especial.</p>
</section>

<main class="contenedor">

    <div class="pasos">
        <div class="paso activo">
            <span class="paso-numero">1</span>
            Elegir ambiente
        </div>

        <div class="paso activo">
            <span class="paso-numero">2</span>
            Seleccionar mesa
        </div>

        <div class="paso">
            <span class="paso-numero">3</span>
            Confirmar reserva
        </div>
    </div>

    <div class="selector-fecha">
        <label>
            FECHA DE RESERVACIÓN
            <input type="date" id="fecha" required>
        </label>

        <label>
            HORA
            <input type="time" id="hora" required>
        </label>
    </div>

    <div class="titulo-seccion">
        <h2>Elige tu ambiente</h2>
        <p>Tenemos diferentes espacios para disfrutar tu visita.</p>
    </div>

    <div class="ambientes">
        <button class="ambiente activo" data-ambiente="interior">
            <span class="emoji">🏛️</span>
            <strong>Salón interior</strong>
            <small>Un espacio elegante y acogedor</small>
        </button>

        <button class="ambiente" data-ambiente="terraza">
            <span class="emoji">🌿</span>
            <strong>Terraza</strong>
            <small>Disfruta al aire libre</small>
        </button>

        <button class="ambiente" data-ambiente="privado">
            <span class="emoji">✨</span>
            <strong>Salón privado</strong>
            <small>Mayor privacidad y comodidad</small>
        </button>
    </div>

    <div class="zona-principal">

        <section class="plano">
            <div class="plano-cabecera">
                <h3>Plano de distribución</h3>
                <span>VISTA SUPERIOR</span>
            </div>

            <div class="sala" id="sala" data-ambiente="interior">
                <div class="rotulo">RESTAURANT PREMIUM</div>
                <div class="decoracion decoracion-izquierda">🌿</div>
                <div class="decoracion decoracion-derecha">🪴</div>
                <div class="barra-restaurante">✦ BAR &amp; LOUNGE ✦</div>

                <div class="mesas-grid">

                    @foreach($mesas as $mesa)

                        <button
                            type="button"
                            class="mesa cap-{{ $mesa->capacidad }}"
                            data-id="{{ $mesa->id }}"
                            data-ambiente="{{ $mesa->ambiente }}"
                            data-capacidad="{{ $mesa->capacidad }}"
                            data-numero="{{ $mesa->numero }}"
                        >

                            <div class="mesa-mueble">
                                <span class="mesa-numero">
                                    {{ str_replace('Mesa ', '', $mesa->numero) }}
                                </span>
                            </div>

                            <div class="mesa-info">
                                <strong>{{ $mesa->numero }}</strong>
                                <small>{{ $mesa->capacidad }} personas</small>
                            </div>

                        </button>

                    @endforeach

                </div>
            </div>

            <div class="leyenda">
                <span><i class="punto verde"></i> Disponible</span>
                <span><i class="punto dorado"></i> Seleccionada</span>
                <span><i class="punto rojo"></i> Ocupada</span>
            </div>
        </section>

        <section class="formulario">

            <h2>Tu reservación</h2>
            <p class="subtitulo">Completa tus datos para solicitar tu mesa.</p>

            <div class="mesa-resumen" id="mesaElegida">
                <div class="vista-mesa">
                    <div class="vista-mueble" id="vistaMueble">
                        <span id="vistaNumero">?</span>
                    </div>
                </div>

                <div class="datos-mesa">
                    <span class="estado-mesa" id="estadoMesa">ESPERANDO SELECCIÓN</span>
                    <h3 id="nombreMesa">Elige tu mesa</h3>
                    <p id="capacidadMesa">Selecciona una mesa del plano</p>
                    <p id="ambienteMesa">📍 Ambiente: pendiente</p>
                </div>
            </div>

            <form id="formReservacion">
                @csrf

                <input type="hidden" name="mesa_id" id="mesa_id">

                <div class="campo">
                    <label>Nombre completo</label>
                    <input type="text" name="nombre"
                        placeholder="Tu nombre completo" required>
                </div>

                <div class="campo">
                    <label>Teléfono</label>
                    <input type="tel" name="telefono"
                        placeholder="Tu número de celular" required>
                </div>

                <div class="campo">
                    <label>Número de personas</label>
                    <select name="personas" id="personas" required>
                        <option value="">Seleccionar cantidad</option>
                        @foreach([2,4,6,8] as $cantidad)
                            <option value="{{ $cantidad }}">
                                {{ $cantidad }} personas
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="campo">
                    <label>Solicitudes especiales</label>
                    <textarea name="solicitudes"
                        placeholder="¿Alguna solicitud especial?"></textarea>
                </div>

                <button type="submit" class="boton">
                    CONFIRMAR RESERVACIÓN
                </button>
            </form>

            <p id="resultado"></p>

        </section>

    </div>

</main>

<footer>
    RESTAURANT PREMIUM · Una experiencia para recordar
</footer>

<script>
    let mesaSeleccionada = null;

    const mesas = document.querySelectorAll('.mesa');
    const ambientes = document.querySelectorAll('.ambiente');
    const personas = document.getElementById('personas');
    const mesaId = document.getElementById('mesa_id');
    const resultado = document.getElementById('resultado');
    const fecha = document.getElementById('fecha');
    const hora = document.getElementById('hora');
    const formulario = document.getElementById('formReservacion');
    const sala = document.getElementById('sala');
    const vistaNumero = document.getElementById('vistaNumero');
    const nombreMesa = document.getElementById('nombreMesa');
    const capacidadMesa = document.getElementById('capacidadMesa');
    const ambienteMesa = document.getElementById('ambienteMesa');
    const estadoMesa = document.getElementById('estadoMesa');

    async function actualizarDisponibilidad() {
        if (!fecha.value || !hora.value) return;

        try {
            const url = new URL(
                "{{ route('reservaciones.disponibilidad') }}",
                window.location.origin
            );

            url.searchParams.set('fecha', fecha.value);
            url.searchParams.set('hora', hora.value);

            const respuesta = await fetch(url, {
                headers: { 'Accept': 'application/json' }
            });

            if (!respuesta.ok) {
                throw new Error('No se pudo consultar la disponibilidad.');
            }

            const datos = await respuesta.json();
            const ocupadas = datos.mesas_ocupadas.map(Number);

            mesas.forEach(mesa => {
                const estaOcupada = ocupadas.includes(Number(mesa.dataset.id));

                mesa.classList.toggle('ocupada', estaOcupada);
                mesa.disabled = estaOcupada;
                mesa.title = estaOcupada
                    ? 'Mesa ocupada en este horario'
                    : 'Mesa disponible';

                if (estaOcupada && mesa === mesaSeleccionada) {
                    limpiarSeleccion();
                }
            });

        } catch (error) {
            resultado.textContent = error.message;
            resultado.style.color = '#e65e5e';
        }
    }

    fecha.addEventListener('change', actualizarDisponibilidad);
    hora.addEventListener('change', actualizarDisponibilidad);

    function limpiarSeleccion() {
        mesas.forEach(mesa => mesa.classList.remove('seleccionada'));

        mesaSeleccionada = null;
        mesaId.value = '';
        vistaNumero.textContent = '?';
        nombreMesa.textContent = 'Elige tu mesa';
        capacidadMesa.textContent = 'Selecciona una mesa del plano';
        ambienteMesa.textContent = '📍 Ambiente: pendiente';
        estadoMesa.textContent = 'ESPERANDO SELECCIÓN';
        estadoMesa.style.color = '#d9ad55';
        personas.value = '';
    }

    mesas.forEach(mesa => {
        mesa.addEventListener('click', () => {
            if (mesa.classList.contains('ocupada')) return;

            mesas.forEach(m => m.classList.remove('seleccionada'));

            mesa.classList.add('seleccionada');
            mesaSeleccionada = mesa;
            mesaId.value = mesa.dataset.id;

            vistaNumero.textContent =
                mesa.dataset.numero.replace('Mesa ', '');

            nombreMesa.textContent = mesa.dataset.numero;

            capacidadMesa.textContent =
                '👥 Capacidad para ' + mesa.dataset.capacidad + ' personas';

            ambienteMesa.textContent =
                '📍 Ambiente: ' + mesa.dataset.ambiente;

            estadoMesa.textContent = '✓ MESA SELECCIONADA';
            estadoMesa.style.color = '#39bd83';

            resultado.textContent = '';
            personas.value = '';
        });
    });

    ambientes.forEach(boton => {
        boton.addEventListener('click', () => {
            ambientes.forEach(b => b.classList.remove('activo'));
            boton.classList.add('activo');
            sala.dataset.ambiente = boton.dataset.ambiente;

            limpiarSeleccion();

            mesas.forEach(mesa => {
                mesa.style.display =
                    mesa.dataset.ambiente === boton.dataset.ambiente
                    ? 'flex' : 'none';
            });
        });
    });

    personas.addEventListener('change', () => {
        if (!mesaSeleccionada) {
            alert('Primero selecciona una mesa.');
            personas.value = '';
            return;
        }

        if (Number(personas.value) > Number(mesaSeleccionada.dataset.capacidad)) {
            alert('La mesa no tiene capacidad suficiente.');
            personas.value = '';
        }
    });

    // Fecha mínima: hoy
    const hoy = new Date();
    const fechaLocal = new Date(
        hoy.getTime() - hoy.getTimezoneOffset() * 60000
    ).toISOString().split('T')[0];

    fecha.min = fechaLocal;

    // Enviar reservación sin recargar la página
    formulario.addEventListener('submit', async function(e) {
        e.preventDefault();

        if (!mesaSeleccionada) {
            alert('Selecciona una mesa en el plano.');
            return;
        }

        if (!fecha.value || !hora.value) {
            alert('Selecciona la fecha y la hora.');
            return;
        }

        if (!personas.value) {
            alert('Selecciona la cantidad de personas.');
            return;
        }

        if (Number(personas.value) > Number(mesaSeleccionada.dataset.capacidad)) {
            alert('La mesa no tiene capacidad suficiente.');
            return;
        }

        const boton = formulario.querySelector('button[type="submit"]');
        boton.disabled = true;
        boton.textContent = 'PROCESANDO...';

        resultado.textContent = 'Estamos registrando tu reservación...';
        resultado.style.color = '#f3d28b';

        const datos = new FormData(formulario);

        // Enviar fecha y hora, que están fuera del formulario
        datos.append('fecha', fecha.value);
        datos.append('hora', hora.value);

        try {
            const respuesta = await fetch("{{ route('reservaciones.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: datos
            });

            const respuestaJson = await respuesta.json();

            if (!respuesta.ok || !respuestaJson.success) {
                throw new Error(
                    respuestaJson.mensaje || 'No se pudo registrar la reservación.'
                );
            }

            resultado.textContent = '✓ ' + respuestaJson.mensaje;
            resultado.style.color = '#39bd83';

            // Crear enlace a WhatsApp sin abrir pestañas en blanco
            const enlace = document.createElement('a');
            enlace.href = respuestaJson.whatsapp;
            enlace.target = '_blank';
            enlace.rel = 'noopener noreferrer';
            enlace.textContent = 'Enviar confirmación por WhatsApp';
            enlace.style.display = 'block';
            enlace.style.marginTop = '12px';
            enlace.style.color = '#39bd83';
            enlace.style.fontWeight = 'bold';

            resultado.appendChild(document.createElement('br'));
            resultado.appendChild(enlace);

            formulario.reset();
            fecha.value = '';
            hora.value = '';
            limpiarSeleccion();

        } catch (error) {
            resultado.textContent = error.message || 'Ocurrió un error. Intenta nuevamente.';
            resultado.style.color = '#e65e5e';

        } finally {
            boton.disabled = false;
            boton.textContent = 'CONFIRMAR RESERVACIÓN';
        }
    });

    // Mostrar inicialmente solo las mesas del salón interior
    mesas.forEach(mesa => {
        mesa.style.display =
            mesa.dataset.ambiente === 'interior' ? 'flex' : 'none';
    });
</script>

@include('restaurante.partials.chatbot')
</body>
</html>
