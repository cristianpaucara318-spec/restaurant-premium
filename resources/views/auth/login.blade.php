
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Restaurant Premium</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: #10100f;
            color: white;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-container {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #1a1917;
            border: 1px solid #ffffff15;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 30px 90px #000b;
        }

        .login-image {
            position: relative;
            background:
                linear-gradient(0deg, #10100fee, #10100f20),
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1100') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 55px;
        }

        .login-image h1 {
            font-family: 'Playfair Display', serif;
            font-size: 43px;
            line-height: 1.2;
            margin-bottom: 15px;
        }

        .login-image h1 span {
            color: #ff922c;
        }

        .login-image p {
            color: #ddd;
            font-size: 13px;
            line-height: 1.8;
        }

        .login-form {
            padding: 65px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 21px;
            font-weight: 900;
            margin-bottom: 45px;
        }

        .logo span {
            color: #ff922c;
        }

        .login-form small {
            color: #ff922c;
            letter-spacing: 3px;
            font-weight: 800;
            font-size: 11px;
        }

        .login-form h2 {
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            margin: 13px 0;
        }

        .description {
            color: #999;
            font-size: 12px;
            margin-bottom: 35px;
        }

        .input-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 12px;
            margin-bottom: 10px;
            color: #ddd;
        }

        input {
            width: 100%;
            padding: 16px;
            background: #252320;
            border: 1px solid #ffffff18;
            border-radius: 10px;
            color: white;
            outline: none;
            font-family: inherit;
        }

        input:focus {
            border-color: #ff922c;
            box-shadow: 0 0 15px #ff922c20;
        }

        .login-button {
            width: 100%;
            border: none;
            padding: 17px;
            border-radius: 10px;
            background: linear-gradient(135deg, #ffad3d, #ed7100);
            color: white;
            font-size: 13px;
            font-weight: 900;
            cursor: pointer;
            transition: .3s;
        }

        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px #ff922c40;
        }

        .register {
            margin-top: 25px;
            text-align: center;
            color: #999;
            font-size: 12px;
        }

        .register a {
            color: #ff922c;
            text-decoration: none;
            font-weight: 800;
        }

        .back {
            display: block;
            text-align: center;
            color: #aaa;
            font-size: 12px;
            text-decoration: none;
            margin-top: 25px;
        }

        @media(max-width: 750px) {
            .login-container {
                grid-template-columns: 1fr;
            }

            .login-image {
                min-height: 260px;
                padding: 30px;
            }

            .login-image h1 {
                font-size: 30px;
            }

            .login-form {
                padding: 40px 28px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-image">
        <h1>Bienvenido a una experiencia <span>extraordinaria.</span></h1>
        <p>Sabores únicos, atención especial y momentos inolvidables.</p>
    </div>

    <div class="login-form">

        <div class="logo">RESTAURANT<span>.</span></div>

        <small>BIENVENIDO NUEVAMENTE</small>

        <h2>Iniciar sesión</h2>

        @if ($errors->any())
            <div style="color:#ff7777; margin-bottom:15px; font-size:13px;">
                {{ $errors->first() }}
            </div>
        @endif

        <p class="description">
            Ingresa tus datos para acceder a tu cuenta.
        </p>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <label>Correo electrónico</label>
                <input type="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>

            <button type="submit" class="login-button">
                INGRESAR A MI CUENTA →
            </button>
        </form>

        <div class="register">
            ¿Todavía no tienes cuenta?
            <a href="{{ route('registro') }}">Crear cuenta</a>
        </div>

        <a href="{{ route('inicio') }}" class="back">
            ← Volver al inicio
        </a>

    </div>

</div>

</body>
</html>
