
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Restaurant Premium</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 28px;
            background: #101010;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        main {
            width: min(1200px, calc(100% - 292px));
            margin-left: 292px;
            margin-right: auto;
        }

        a {
            color: #ff9800;
            text-decoration: none;
        }

        h1, h2, h3, p {
            margin-top: 0;
        }

        .topbar,
        .panel,
        .product-card {
            background: #1b1b1b;
            border: 1px solid #303030;
            border-radius: 16px;
        }

        .topbar {
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

        .topbar h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .muted {
            color: #aaa;
            font-size: 14px;
        }

        .back-link {
            font-weight: bold;
            white-space: nowrap;
        }

        .panel {
            padding: 25px;
            margin-bottom: 30px;
        }

        .panel h2,
        .catalog-title {
            font-size: 22px;
            margin-bottom: 22px;
        }

        .fields {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ddd;
            font-size: 13px;
        }

        input:not([type="checkbox"]):not([type="file"]),
        textarea {
            width: 100%;
            padding: 13px;
            background: #252525;
            border: 1px solid #414141;
            border-radius: 9px;
            color: white;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #ff9800;
        }

        input[type="file"] {
            width: 100%;
            padding: 11px;
            background: #252525;
            border: 1px solid #414141;
            border-radius: 9px;
            color: white;
        }

        textarea {
            min-height: 95px;
            resize: vertical;
        }

        .full {
            grid-column: 1 / -1;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 25px;
        }

        .checkbox input {
            accent-color: #ff9800;
            width: 17px;
            height: 17px;
        }

        .checkbox label {
            margin: 0;
        }

        button {
            border: none;
            border-radius: 9px;
            padding: 13px 19px;
            background: linear-gradient(135deg, #ffb000, #ff7200);
            color: #111;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        button:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 22px;
        }

        .product-card {
            overflow: hidden;
            transition: .25s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: #ff9800;
        }

        .product-image {
            width: 100%;
            height: 205px;
            object-fit: cover;
            display: block;
            background: #252525;
        }

        .no-image {
            height: 205px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #252525;
            color: #999;
        }

        .product-content {
            padding: 20px;
        }

        .product-content h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .price {
            color: #ffad22;
            font-size: 20px;
            font-weight: bold;
        }

        .product-info {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 14px 0;
        }

        .tag {
            padding: 7px 10px;
            background: #292929;
            border-radius: 7px;
            font-size: 12px;
            color: #ddd;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            background: #173e28;
            color: #6bdf91;
        }

        .inactive {
            background: #492020;
            color: #ff8888;
        }

        details {
            border-top: 1px solid #333;
            padding-top: 15px;
            margin-top: 18px;
        }

        summary {
            color: #ffad22;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .delete {
            background: #a52f2f;
            color: white;
        }

        .notice,
        .errors {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .notice {
            background: #173e28;
            color: #8ff0ac;
        }

        .errors {
            background: #492020;
            color: #ffaaaa;
        }

        .empty {
            grid-column: 1 / -1;
            padding: 35px;
            text-align: center;
            background: #1b1b1b;
            border: 1px dashed #444;
            border-radius: 14px;
            color: #aaa;
        }

        @media(max-width: 900px) {
            main {
                width: 100%;
                margin: 20px 0;
            }
        }

        @media(max-width: 600px) {
            body {
                padding: 15px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .fields {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .checkbox {
                padding-top: 0;
            }
        }
    </style>
</head>

<body>

@include('admin.partials.sidebar')

<main>

    <header class="topbar">
        <div>
            <h1>Gestión de productos</h1>
            <p class="muted">Administra los platos y bebidas de tu restaurante.</p>
        </div>

        <a class="back-link" href="{{ route('admin.dashboard') }}">
            ← Volver al dashboard
        </a>
    </header>

    @if (session('success'))
        <div class="notice">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <section class="panel">

        <h2>＋ Agregar nuevo producto</h2>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="fields">

                <div>
                    <label for="nombre">Nombre del producto</label>
                    <input id="nombre" name="nombre"
                           value="{{ old('nombre') }}"
                           placeholder="Ej. Pollo a la parrilla"
                           required maxlength="255">
                </div>

                <div>
                    <label for="categoria">Categoría</label>
                    <input id="categoria" name="categoria"
                           value="{{ old('categoria') }}"
                           placeholder="Ej. Platos principales"
                           required maxlength="100">
                </div>

                <div>
                    <label for="precio">Precio (Bs.)</label>
                    <input id="precio" name="precio" type="number"
                           min="0.01" step="0.01"
                           value="{{ old('precio') }}"
                           placeholder="Ej. 45.00" required>
                </div>

                <div>
                    <label for="stock">Stock disponible</label>
                    <input id="stock" name="stock" type="number"
                           min="0" step="1"
                           value="{{ old('stock', 0) }}" required>
                </div>

                <div class="full">
                    <label for="descripcion">Descripción del producto</label>
                    <textarea id="descripcion" name="descripcion"
                              placeholder="Describe los ingredientes y características del plato...">{{ old('descripcion') }}</textarea>
                </div>

                <div>
                    <label for="imagen">Fotografía del producto (máximo 2 MB)</label>
                    <input id="imagen" name="imagen" type="file" accept="image/*">
                </div>

                <div class="checkbox">
                    <input type="hidden" name="estado" value="0">
                    <input id="estado" name="estado" type="checkbox"
                           value="1" @checked(old('estado', true))>
                    <label for="estado">Producto activo</label>
                </div>

            </div>

            <br>
            <button type="submit">Guardar producto</button>

        </form>

    </section>

    <h2 class="catalog-title">Nuestro catálogo</h2>

    <section class="products">

        @forelse ($productos as $producto)

            <article class="product-card">

                @if ($producto->imagen)
                    <img class="product-image"
                         src="{{ asset('storage/'.$producto->imagen) }}"
                         alt="{{ $producto->nombre }}">
                @else
                    <div class="no-image">Sin fotografía disponible</div>
                @endif

                <div class="product-content">

                    <h3>{{ $producto->nombre }}</h3>

                    <div class="price">
                        Bs. {{ number_format((float) $producto->precio, 2) }}
                    </div>

                    <div class="product-info">
                        <span class="tag">{{ $producto->categoria }}</span>
                        <span class="tag">Stock: {{ $producto->stock }}</span>
                    </div>

                    <p class="muted">
                        {{ $producto->descripcion ?: 'Sin descripción disponible.' }}
                    </p>

                    <span class="status {{ $producto->estado ? '' : 'inactive' }}">
                        {{ $producto->estado ? '● Activo' : '● Inactivo' }}
                    </span>

                    <details>
                        <summary>✎ Editar producto</summary>

                        <form action="{{ route('productos.update', $producto) }}"
                              method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="fields">

                                <div>
                                    <label for="nombre-{{ $producto->id }}">Nombre</label>
                                    <input id="nombre-{{ $producto->id }}"
                                           name="nombre"
                                           value="{{ $producto->nombre }}"
                                           required maxlength="255">
                                </div>

                                <div>
                                    <label for="categoria-{{ $producto->id }}">Categoría</label>
                                    <input id="categoria-{{ $producto->id }}"
                                           name="categoria"
                                           value="{{ $producto->categoria }}"
                                           required maxlength="100">
                                </div>

                                <div>
                                    <label for="precio-{{ $producto->id }}">Precio</label>
                                    <input id="precio-{{ $producto->id }}"
                                           name="precio" type="number"
                                           min="0.01" step="0.01"
                                           value="{{ $producto->precio }}" required>
                                </div>

                                <div>
                                    <label for="stock-{{ $producto->id }}">Stock</label>
                                    <input id="stock-{{ $producto->id }}"
                                           name="stock" type="number"
                                           min="0" step="1"
                                           value="{{ $producto->stock }}" required>
                                </div>

                                <div class="full">
                                    <label for="descripcion-{{ $producto->id }}">Descripción</label>
                                    <textarea id="descripcion-{{ $producto->id }}"
                                              name="descripcion">{{ $producto->descripcion }}</textarea>
                                </div>

                                <div>
                                    <label for="imagen-{{ $producto->id }}">Cambiar fotografía</label>
                                    <input id="imagen-{{ $producto->id }}"
                                           name="imagen" type="file" accept="image/*">
                                </div>

                                <div class="checkbox">
                                    <input type="hidden" name="estado" value="0">
                                    <input id="estado-{{ $producto->id }}"
                                           name="estado" type="checkbox"
                                           value="1" @checked($producto->estado)>
                                    <label for="estado-{{ $producto->id }}">Producto activo</label>
                                </div>

                            </div>

                            <div class="actions">
                                <button type="submit">Guardar cambios</button>
                            </div>

                        </form>
                    </details>

                    <form action="{{ route('productos.destroy', $producto) }}"
                          method="POST"
                          class="actions"
                          onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">

                        @csrf
                        @method('DELETE')

                        <button class="delete" type="submit">Eliminar producto</button>

                    </form>

                </div>
            </article>

        @empty

            <div class="empty">
                <h3>Tu catálogo está vacío</h3>
                <p>Agrega tu primer plato utilizando el formulario de arriba.</p>
            </div>

        @endforelse

    </section>

</main>

</body>
</html>
