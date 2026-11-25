<aside class="admin-sidebar">
    <div class="admin-brand">
        <i class="fas fa-utensils"></i>
        <div>RESTAURANT<span>.</span></div>
    </div>

    <div class="admin-menu-title">MENÚ PRINCIPAL</div>

    <nav class="admin-menu">
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i><span>Dashboard</span>
        </a>

        <a href="{{ route('productos.index') }}"
           class="{{ request()->routeIs('productos.*') ? 'active' : '' }}">
            <i class="fas fa-burger"></i><span>Productos</span>
        </a>

        <a href="{{ route('admin.categorias') }}"
           class="{{ request()->routeIs('admin.categorias') ? 'active' : '' }}">
            <i class="fas fa-layer-group"></i><span>Categorías</span>
        </a>

        <a href="{{ route('admin.pedidos') }}"
           class="{{ request()->routeIs('admin.pedidos') ? 'active' : '' }}">
            <i class="fas fa-receipt"></i><span>Pedidos</span>
        </a>

        <a href="{{ route('admin.clientes') }}"
           class="{{ request()->routeIs('admin.clientes') ? 'active' : '' }}">
            <i class="fas fa-users"></i><span>Clientes</span>
        </a>

        <a href="{{ route('admin.reservaciones') }}"
           class="{{ request()->routeIs('admin.reservaciones') ? 'active' : '' }}">
            <i class="fas fa-calendar-check"></i><span>Reservaciones</span>
        </a>

        <a href="{{ route('admin.usuarios') }}"
           class="{{ request()->routeIs('admin.usuarios') ? 'active' : '' }}">
            <i class="fas fa-user-shield"></i><span>Usuarios</span>
        </a>

        <a href="{{ route('admin.configuracion') }}"
           class="{{ request()->routeIs('admin.configuracion') ? 'active' : '' }}">
            <i class="fas fa-gear"></i><span>Configuración</span>
        </a>
    </nav>
</aside>

<style>
    .admin-sidebar {
        position: fixed;
        inset: 0 auto 0 0;
        z-index: 20;
        width: 260px;
        padding: 25px 14px;
        background: #171717;
        border-right: 1px solid #303030;
        overflow-y: auto;
    }

    .admin-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #fff;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 38px;
        padding: 0 8px;
    }

    .admin-brand i {
        width: 46px;
        height: 46px;
        display: grid;
        place-items: center;
        border-radius: 14px;
        background: linear-gradient(135deg, #ffb52e, #ff7900);
        color: #111;
    }

    .admin-brand span {
        color: #ff8500;
    }

    .admin-menu-title {
        color: #8e98b3;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        margin: 0 10px 14px;
    }

    .admin-menu {
        display: grid;
        gap: 7px;
    }

    .admin-menu a {
        display: flex;
        align-items: center;
        gap: 14px;
        min-height: 47px;
        padding: 0 14px;
        border-radius: 10px;
        color: #bdbdbd;
        text-decoration: none;
        font-size: 14px;
        transition: .25s;
    }

    .admin-menu a i {
        width: 18px;
        text-align: center;
    }

    .admin-menu a:hover {
        background: #292929;
        color: #fff;
    }

    .admin-menu a.active {
        background: linear-gradient(135deg, #ffb52e, #ff7900);
        color: #111;
        font-weight: 800;
    }

    @media (max-width: 700px) {
        .admin-sidebar {
            position: static;
            width: 100%;
            border-right: 0;
            border-bottom: 1px solid #303030;
        }

        .admin-menu {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
</style>
