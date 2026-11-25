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
            font-family: Arial, sans-serif;
            background: #101114;
            color: #f5f5f5;
            padding: 35px;
        }

        .contenedor {
            max-width: 1450px;
            margin: auto;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .encabezado h1 {
            font-size: 30px;
            color: #e8b85c;
        }

        .encabezado p {
            color: #999;
            margin-top: 8px;
        }

        .volver {
            background: #e8b85c;
            color: #171717;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .estadisticas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .tarjeta {
            background: #1b1d22;
            padding: 25px;
            border: 1px solid #303137;
            border-radius: 14px;
        }

        .tarjeta span {
            color: #aaa;
            font-size: 14px;
        }

        .tarjeta h2 {
            font-size: 32px;
            margin-top: 12px;
            color: #e8b85c;
        }

        .panel {
            background: #1b1d22;
            border: 1px solid #303137;
            border-radius: 14px;
            padding: 25px;
            overflow-x: auto;
        }

        .panel h2 {
            color: #e8b85c;
            margin-bottom: 22px;
        }

        .mensaje {
            padding: 14px;
            background: #174d37;
            color: #b8f5d5;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th {
            text-align: left;
            color: #e8b85c;
            padding: 16px 12px;
            border-bottom: 1px solid #444;
            font-size: 13px;
        }

        td {
            padding: 17px 12px;
            border-bottom: 1px solid #303137;
            color: #ddd;
            font-size: 14px;
        }

        .estado {
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .pendiente {
            background: #59471d;
            color: #ffdc83;
        }

        .confirmada {
            background: #174d37;
            color: #8be4b5;
        }

        .cancelada {
            background: #572525;
            color: #ffaaaa;
        }

        .acciones {
            display: flex;
            gap: 8px;
        }

        .acciones form {
            display: inline;
        }

        .btn {
            border: none;
            padding: 9px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px;
        }

        .btn-confirmar {
            background: #1c8c59;
            color: white;
        }

        .btn-cancelar {
            background: #b83b3b;
            color: white;
        }

        .sin-datos {
            text-align: center;
            padding: 35px;
            color: #aaa;
        }

        .paginacion {
            margin-top: 20px;
        }

        .paginacion nav {
            display: flex;
            justify-content: center;
        }

        @media(max-width: 700px) {
            body {
                padding: 15px;
            }

            .estadisticas {
                grid-template-columns: 1fr;
            }

            .encabezado h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <div class="encabezado">
        <div>
            <h1>✦ Gestión de Reservaciones</h1>
            <p>Administra las reservas de tus clientes.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="volver">
            ← Volver al panel
        </a>
    </div>

    <div class="estadisticas">

        <div class="tarjeta">
            <span>Total de reservaciones</span>
            <h2>{{ \App\Models\Reservacion::count() }}</h2>
        </div>

        <div class="tarjeta">
            <span>Reservaciones pendientes</span>
            <h2>{{ \App\Models\Reservacion::where('estado', 'pendiente')->count() }}</h2>
        </div>

        <div class="tarjeta">
            <span>Reservaciones confirmadas</span>
            <h2>{{ \App\Models\Reservacion::where('estado', 'confirmada')->count() }}</h2>
        </div>

    </div>

    <div class="panel">

        <h2>Listado de reservaciones</h2>

        <form method="GET" action="{{ route('admin.reservaciones') }}"
            style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:25px;">

            <input
                type="text"
                name="buscar"
                value="{{ request('buscar') }}"
                placeholder="Buscar cliente o teléfono..."
                style="padding:12px;border-radius:8px;border:1px solid #444;background:#25272d;color:white;flex:2;min-width:200px;">

            <input
                type="date"
                name="fecha"
                value="{{ request('fecha') }}"
                style="padding:12px;border-radius:8px;border:1px solid #444;background:#25272d;color:white;">

            <select
                name="estado"
                style="padding:12px;border-radius:8px;border:1px solid #444;background:#25272d;color:white;">

                <option value="">Todos los estados</option>
                <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendientes</option>
                <option value="confirmada" {{ request('estado') == 'confirmada' ? 'selected' : '' }}>Confirmadas</option>
                <option value="cancelada" {{ request('estado') == 'cancelada' ? 'selected' : '' }}>Canceladas</option>
            </select>

            <button type="submit"
                style="background:#e8b85c;color:#171717;border:0;padding:12px 20px;border-radius:8px;font-weight:bold;cursor:pointer;">
                Buscar
            </button>

            <a href="{{ route('admin.reservaciones') }}"
                style="background:#383a41;color:white;padding:12px 18px;border-radius:8px;text-decoration:none;">
                Limpiar
            </a>

        </form>

        @if(session('success'))
            <div class="mensaje">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Mesa</th>
                    <th>Personas</th>
                    <th>Solicitudes</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($reservaciones as $reserva)
                    <tr>
                        <td>{{ $reserva->nombre }}</td>
                        <td>{{ $reserva->telefono }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                        <td>{{ $reserva->hora }}</td>
                        <td>
                            {{ $reserva->mesa ? 'Mesa '.$reserva->mesa->numero : 'Sin mesa' }}
                        </td>
                        <td>{{ $reserva->personas }}</td>
                        <td>{{ $reserva->solicitudes ?: 'Sin solicitudes especiales' }}</td>
                        <td>
                            <span class="estado {{ $reserva->estado }}">
                                {{ ucfirst($reserva->estado) }}
                            </span>
                        </td>
                        <td>
                            <div class="acciones">

                                @if($reserva->estado === 'pendiente')
                                    <form method="POST"
                                        action="{{ route('admin.reservaciones.estado', $reserva->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="estado" value="confirmada">
                                        <button class="btn btn-confirmar">
                                            Confirmar
                                        </button>
                                    </form>
                                @endif

                                @if(in_array($reserva->estado, ['pendiente', 'confirmada']))
                                    <form method="POST"
                                        action="{{ route('admin.reservaciones.estado', $reserva->id) }}"
                                        onsubmit="return confirm('¿Seguro que deseas cancelar esta reservación?')">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="estado" value="cancelada">
                                        <button class="btn btn-cancelar">
                                            Cancelar
                                        </button>
                                    </form>
                                @endif

                                <a href="https://wa.me/591{{ preg_replace('/\D/', '', $reserva->telefono) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="btn"
                                   style="background:#168b55;color:white;text-decoration:none;">
                                    WhatsApp
                                </a>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="sin-datos">
                            Todavía no hay reservaciones registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="paginacion">
            {{ $reservaciones->links() }}
        </div>

    </div>

</div>

</body>
</html>
