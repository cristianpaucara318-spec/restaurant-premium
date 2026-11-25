<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }} | Restaurante Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #101010; color: #f5f5f5; font-family: Arial, sans-serif; }
        main { width: min(1100px, calc(100% - 292px)); margin: 32px 32px 32px 292px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; }
        h1 { margin-bottom: 6px; }
        p { color: #aaa; }
        a { color: #ffad3d; text-decoration: none; }
        .panel { margin-top: 24px; padding: 20px; background: #1b1b1b; border: 1px solid #303030; border-radius: 14px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px; border-bottom: 1px solid #303030; text-align: left; }
        th { color: #ffad3d; }
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
            <h1>{{ $titulo }}</h1>
            <p>{{ $descripcion }}</p>
        </div>
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-left"></i> Volver al Dashboard</a>
    </div>

    <section class="panel">
        @if (count($encabezados) === 0)
            <div class="empty">Esta sección está preparada para futuras reservaciones.</div>
        @else
            <table>
                <thead>
                    <tr>
                        @foreach ($encabezados as $encabezado)
                            <th>{{ $encabezado }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse ($filas as $fila)
                        <tr>
                            @foreach ($fila as $dato)
                                <td>{{ $dato }}</td>
                            @endforeach
                        </tr>
                    @empty
                        <tr><td colspan="{{ count($encabezados) }}" class="empty">No hay registros.</td></tr>
                    @endforelse
                </tbody>
            </table>
        @endif
    </section>
</main>
</body>
</html>
