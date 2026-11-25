<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Restaurante Premium</title>
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
            min-height: 100vh;
            background: #101010;
            color: #fff;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 255px;
            padding: 25px 17px;
            background: #171717;
            border-right: 1px solid #292929;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
            font-size: 18px;
            font-weight: 800;
        }

        .brand i,
        .profile-icon {
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #ffb000, #ff6900);
            color: #111;
        }

        .brand i {
            padding: 13px;
            border-radius: 12px;
        }

        .brand span {
            color: #ff9800;
        }

        .menu-title {
            padding: 12px;
            color: #777;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .menu a,
        .sidebar-bottom a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            color: #aaa;
            font-size: 13px;
            text-decoration: none;
        }

        .menu a {
            margin: 5px 0;
            border-radius: 10px;
            transition: .3s;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(100deg, #ff9d00, #ff6900);
            color: #111;
            font-weight: 700;
        }

        .menu a i {
            width: 20px;
            text-align: center;
        }

        .sidebar-bottom {
            position: absolute;
            right: 17px;
            bottom: 25px;
            left: 17px;
        }

        .main {
            margin-left: 255px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 35px;
        }

        .topbar h1 {
            font-size: 25px;
        }

        .topbar p,
        .welcome p {
            margin-top: 5px;
            color: #888;
            font-size: 12px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 15px;
            background: #1b1b1b;
            border: 1px solid #303030;
            border-radius: 12px;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .profile strong,
        .profile small {
            display: block;
        }

        .profile strong {
            font-size: 12px;
        }

        .profile small {
            color: #888;
            font-size: 10px;
        }

        .welcome {
            display: flex;
            min-height: 190px;
            flex-direction: column;
            justify-content: center;
            padding: 35px;
            margin-bottom: 25px;
            background:
                linear-gradient(90deg, rgba(0,0,0,.94), rgba(0,0,0,.35)),
                url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1400') center/cover;
            border: 1px solid #393027;
            border-radius: 18px;
        }

        .welcome small {
            color: #ff9d00;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .welcome h2 {
            margin: 10px 0;
            font-size: 27px;
        }

        .section-title {
            margin: 30px 0 17px;
            font-size: 17px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
        }

        .stat-card,
        .panel {
            padding: 22px;
            background: #1b1b1b;
            border: 1px solid #303030;
            border-radius: 15px;
        }

        .stat-icon {
            display: grid;
            width: 43px;
            height: 43px;
            place-items: center;
            margin-bottom: 18px;
            background: rgba(255,153,0,.13);
            color: #ff9d00;
            border-radius: 12px;
            font-size: 18px;
        }

        .stat-card p {
            color: #999;
            font-size: 12px;
        }

        .stat-card h3 {
            margin-top: 6px;
            font-size: 25px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 18px;
            margin-top: 20px;
        }

        .panel h3 {
            margin-bottom: 20px;
            font-size: 15px;
        }

        .panel h3 i,
        .activity i {
            color: #ff9800;
        }

        .chart {
            display: flex;
            height: 180px;
            align-items: end;
            justify-content: space-around;
            padding-top: 15px;
            border-bottom: 1px solid #393939;
        }

        .bar {
            width: 9%;
            min-height: 15px;
            background: linear-gradient(180deg, #ffb000, #ff6900);
            border-radius: 7px 7px 0 0;
        }

        .days {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
            color: #888;
            font-size: 10px;
        }

        .activity {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid #303030;
        }

        .activity:last-child {
            border: 0;
        }

        .activity i {
            padding: 12px;
            background: rgba(255,153,0,.12);
            border-radius: 10px;
        }

        .activity strong,
        .activity small {
            display: block;
        }

        .activity strong {
            font-size: 12px;
        }

        .activity small {
            color: #888;
            font-size: 10px;
        }

        @media (max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 750px) {
            .sidebar {
                width: 70px;
                padding: 20px 8px;
            }

            .brand {
                justify-content: center;
                padding: 5px 0 30px;
            }

            .brand span,
            .brand div,
            .menu-title,
            .menu a span,
            .sidebar-bottom span {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 14px 5px;
            }

            .sidebar-bottom {
                right: 8px;
                left: 8px;
            }

            .main {
                margin-left: 70px;
                padding: 18px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .welcome h2 {
                font-size: 21px;
            }
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="brand">
            <i class="fas fa-utensils"></i>
            <div>RESTAURANT<span>.</span></div>
        </div>

        <div class="menu-title">MENÚ PRINCIPAL</div>
        <nav class="menu">
            <a href="{{ route('admin.dashboard') }}" class="active">
                <i class="fas fa-chart-pie"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('productos.index') }}"><i class="fas fa-burger"></i><span>Productos</span></a>
            <a href="{{ route('admin.categorias') }}"><i class="fas fa-layer-group"></i><span>Categorías</span></a>
            <a href="{{ route('admin.pedidos') }}"><i class="fas fa-receipt"></i><span>Pedidos</span></a>
            <a href="{{ route('admin.clientes') }}"><i class="fas fa-users"></i><span>Clientes</span></a>
            <a href="{{ route('admin.reservaciones') }}"><i class="fas fa-calendar-check"></i><span>Reservaciones</span></a>
            <a href="{{ route('admin.usuarios') }}"><i class="fas fa-user-shield"></i><span>Usuarios</span></a>
            <a href="{{ route('admin.configuracion') }}"><i class="fas fa-gear"></i><span>Configuración</span></a>
        </nav>

        <div class="sidebar-bottom">
            <a href="{{ route('inicio') }}">
                <i class="fas fa-globe"></i><span>Ver sitio web</span>
            </a>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>Dashboard</h1>
                <p>Bienvenido al centro de administración de tu restaurante.</p>
            </div>
            <div class="profile">
                <div class="profile-icon"><i class="fas fa-user"></i></div>
                <div>
                    <strong>{{ auth()->user()->name }}</strong>
                    <small>Usuario registrado</small>
                </div>
            </div>
        </header>

        <section class="welcome">
            <small>PANEL DE CONTROL</small>
            <h2>¡Bienvenido a Restaurante Premium!</h2>
            <p>Administra tu restaurante desde un solo lugar.</p>
        </section>

        <h2 class="section-title">Resumen general</h2>
        <section class="stats">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                <p>Ventas del día</p>
                <h3>Bs. {{ number_format($ventasHoy ?? 0, 2) }}</h3>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-receipt"></i></div>
                <p>Pedidos realizados</p>
                <h3>{{ $totalPedidos ?? 0 }}</h3>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-burger"></i></div>
                <p>Productos registrados</p>
                <h3>{{ $totalProductos ?? 0 }}</h3>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <p>Clientes registrados</p>
                <h3>{{ $totalClientes ?? 0 }}</h3>
            </div>
        </section>

        <section class="content-grid">
            <div class="panel">
                <h3><i class="fas fa-chart-column"></i> Actividad semanal</h3>
                <div class="chart" aria-label="Gráfico ilustrativo de actividad semanal">
                    <div class="bar" style="height:35%"></div>
                    <div class="bar" style="height:55%"></div>
                    <div class="bar" style="height:40%"></div>
                    <div class="bar" style="height:80%"></div>
                    <div class="bar" style="height:65%"></div>
                    <div class="bar" style="height:95%"></div>
                    <div class="bar" style="height:50%"></div>
                </div>
                <div class="days">
                    <span>Lun</span><span>Mar</span><span>Mié</span><span>Jue</span>
                    <span>Vie</span><span>Sáb</span><span>Dom</span>
                </div>
            </div>

            <div class="panel">
                <h3><i class="fas fa-clock"></i> Actividad reciente</h3>
                <div class="activity">
                    <i class="fas fa-user-plus"></i>
                    <div><strong>Cuenta creada</strong><small>Registro de usuario completado</small></div>
                </div>
                <div class="activity">
                    <i class="fas fa-store"></i>
                    <div><strong>Restaurante activo</strong><small>Panel preparado correctamente</small></div>
                </div>
                <div class="activity">
                    <i class="fas fa-shield-halved"></i>
                    <div><strong>Acceso seguro</strong><small>Sesión iniciada</small></div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
