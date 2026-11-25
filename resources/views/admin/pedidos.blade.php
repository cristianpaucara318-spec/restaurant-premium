<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | Restaurante Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #101010; color: #f5f5f5; font-family: Arial, sans-serif; }
        main { width: min(1100px, calc(100% - 292px)); margin: 32px 32px 32px 292px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; }
        h1 { margin-bottom: 6px; }
        p { color: #aaa; }
        a { color: #ffad3d; text-decoration: none; }
        .panel { overflow-x: auto; margin-top: 24px; padding: 20px; background: #1b1b1b; border: 1px solid #303030; border-radius: 14px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px; border-bottom: 1px solid #303030; text-align: left; white-space: nowrap; }
        th { color: #ffad3d; }
        .estado { padding: 5px 9px; border-radius: 999px; background: #332000; color: #ffc56a; }
        .empty { text-align: center; color: #aaa; padding: 32px 14px; }
        @media (max-width: 700px) {
            main { width: calc(100% - 32px); margin: 24px auto; }
        }
    </style>
</head>
<body>
@include('admin.partials.sidebar')
<main>
    <div class="topbar">
        <div>
            <h1>Pedidos</h1>
            <p>Pedidos registrados en el restaurante.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-left"></i> Volver al Dashboard</a>
    </div>

    <section class="panel">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidos as $pedido)
                    <tr>
                        <td>#{{ $pedido->id }}</td>
                        <td>{{ $pedido->nombre_cliente }}</td>
                        <td>{{ $pedido->tipo_pedido }}</td>
                        <td>Bs. {{ number_format($pedido->total, 2) }}</td>
                        <td><span class="estado">{{ ucfirst($pedido->estado) }}</span></td>
                        <td>{{ $pedido->created_at?->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">No hay pedidos registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
</main>
</body>
</html>
