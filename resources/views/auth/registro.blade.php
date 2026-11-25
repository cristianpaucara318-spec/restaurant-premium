
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | Restaurante Premium</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                linear-gradient(120deg, rgba(0,0,0,.94), rgba(0,0,0,.78)),
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1600');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
            color: white;
        }

        .registro-container {
            width: 100%;
            max-width: 480px;
            padding: 38px;
            background: rgba(17, 17, 17, .94);
            border: 1px solid rgba(255, 166, 0, .3);
            border-radius: 22px;
            box-shadow: 0 20px 60px rgba(0,0,0,.6);
            backdrop-filter: blur(12px);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: linear-gradient(135deg, #ffb000, #ff6900);
            color: #111;
            font-size: 30px;
        }

        .logo h1 {
            font-size: 25px;
            font-weight: 800;
        }

        .logo h1 span {
            color: #ff9d00;
        }

        .logo p {
            color: #aaa;
            font-size: 13px;
            margin-top: 5px;
        }

        .titulo {
            text-align: center;
            margin-bottom: 25px;
        }

        .titulo h2 {
            font-size: 23px;
            margin-bottom: 5px;
        }

        .titulo p {
            color: #999;
            font-size: 13px;
        }

        .campo {
            margin-bottom: 17px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            color: #ddd;
            font-size: 13px;
            font-weight: 500;
        }

        .campo input {
            width: 100%;
            padding: 14px 15px;
            background: #222;
            border: 1px solid #393939;
            border-radius: 10px;
            color: white;
            font-size: 14px;
            outline: none;
            transition: .3s;
        }

        .campo input:focus {
            border-color: #ff9900;
            box-shadow: 0 0 0 3px rgba(255,153,0,.12);
        }

        .btn-registro {
            width: 100%;
            padding: 15px;
            margin-top: 8px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ffb000, #ff6900);
            color: #111;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: .3s;
        }

        .btn-registro:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255,140,0,.3);
        }

        .login-link {
            text-align: center;
            margin-top: 23px;
            color: #aaa;
            font-size: 13px;
        }

        .login-link a {
            color: #ff9d00;
            text-decoration: none;
            font-weight: 700;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #888;
            text-decoration: none;
            font-size: 12px;
        }

        .volver:hover {
            color: #ff9d00;
        }

        @media(max-width: 480px) {
            .registro-container {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="registro-container">

        <div class="logo">
            <div class="logo-icon">🍽️</div>
            <h1>RESTAURANTE <span>PREMIUM</span></h1>
            <p>Una experiencia de sabor única</p>
        </div>

        <div class="titulo">
            <h2>Crear una cuenta</h2>
            <p>Regístrate para disfrutar de nuestros servicios</p>
        </div>

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf

            <div class="campo">
                <label>Nombre completo</label>
                <input type="text" name="name" placeholder="Ingresa tu nombre completo" required>
            </div>

            <div class="campo">
                <label>Correo electrónico</label>
                <input type="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="campo">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Crea una contraseña" required>
            </div>

            <div class="campo">
                <label>Confirmar contraseña</label>
                <input type="password" name="password_confirmation" placeholder="Repite tu contraseña" required>
            </div>

            <button type="submit" class="btn-registro">
                CREAR MI CUENTA →
            </button>
        </form>

        <div class="login-link">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}">Iniciar sesión</a>
        </div>

        <a href="{{ route('inicio') }}" class="volver">
            ← Volver al inicio
        </a>

    </div>

</body>
</html>
