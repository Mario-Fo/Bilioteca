<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(3);
        return view('categorias.index', compact('categorias'));
    }

    public function create ()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Categoria::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoria agregada correctamente.');}

        public function edit($id)
        {
            $categoria = Categoria::findOrFail($id);
            return view('categorias.edit', compact('categoria'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'nombre' => 'required|string|max:255',
            ]);

            $categoria = Categoria::findOrFail($id);
            $categoria->nombre = $request->nombre;
            $categoria->save();

            return redirect()->route('categorias.index')->with('success', 'Categoria actualizada correctamente.');
        }

        public function destroy($id)
        {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();

            return redirect()->route('categorias.index')->with('success', 'Categoria eliminada correctamente.');
        }
}
