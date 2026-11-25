<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::latest()->get();

        return view('productos.index', compact('productos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')
                ->store('productos', 'public');
        }

        $datos['estado'] = $request->has('estado') ? $request->boolean('estado') : true;

        Producto::create($datos);

        return redirect()->route('productos.index')
            ->with('success', 'Producto registrado correctamente.');
    }

    public function update(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenAnterior = $producto->imagen;
            $nuevaImagen = $request->file('imagen')
                ->store('productos', 'public');

            if ($nuevaImagen === false) {
                throw new \RuntimeException('No se pudo guardar la imagen del producto.');
            }

            $datos['imagen'] = $nuevaImagen;

            if ($imagenAnterior) {
                Storage::disk('public')->delete($imagenAnterior);
            }
        }

        $datos['estado'] = $request->has('estado') ? $request->boolean('estado') : true;

        $producto->update($datos);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
