<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\User;

class PrestamosController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['usuario', 'libro'])->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        return view('prestamos.create');
    }

    public function buscar_usuario(Request $request)
    {
        $request->validate([
            'usuario_id' => ['nullable', 'integer', 'required_without:usuario_nombre'],
            'usuario_nombre' => ['nullable', 'string', 'max:255', 'required_without:usuario_id'],
        ], [
            'usuario_id.required_without' => 'Ingresa un ID o un nombre para buscar.',
            'usuario_id.integer' => 'El ID del usuario debe ser numérico.',
            'usuario_nombre.required_without' => 'Ingresa un ID o un nombre para buscar.',
        ]);

        $usuario = null;

        if ($request->filled('usuario_id')) {
            $usuario = User::find($request->input('usuario_id'));
        } else {
            $usuario = User::where('name', 'like', '%' . $request->input('usuario_nombre') . '%')->first();
        }

        if (!$usuario) {
            return redirect()->route('prestamos.create')
                ->withInput()
                ->withErrors(['usuario_busqueda' => 'No se encontró un usuario con esos datos.']);
        }

        return view('prestamos.create', compact('usuario'));
    }

    public function select_libro(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $usuario = User::findOrFail($usuario_id);
        $libros = Libro::all();
        return view('prestamos.select_libro', compact('usuario', 'libros'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => ['required', 'integer', 'exists:users,id'],
            'libro_id' => ['required', 'integer', 'exists:libros,id'],
        ]);

        #Crear transaccion 
        \DB::beginTransaction();

        try {
            $prestamo = new Prestamo();
            $prestamo->usuario_id = $request->input('usuario_id');
            $prestamo->libro_id = $request->input('libro_id');
            $prestamo->save();

            $libro = Libro::findOrFail($request->input('libro_id'));
            $libro->estatus = 1; // Marcar como prestado
            $libro->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('prestamos.index')->with('error', 'Ocurrió un error al registrar el préstamo: ' . $e->getMessage());
        }


        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente.');
    }

    public function entregar($id)
    {
        \DB::beginTransaction();

        try {
            $prestamo = Prestamo::with('libro')->findOrFail($id);

            if ($prestamo->estado === 'entregado') {
                return redirect()->route('prestamos.index')->with('success', 'Este prÃ©stamo ya estaba entregado.');
            }

            $prestamo->estado = 'entregado';
            $prestamo->fecha_entrega = now();
            $prestamo->save();

            if ($prestamo->libro) {
                $prestamo->libro->estatus = 0; // Marcar como disponible
                $prestamo->libro->save();
            }

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('prestamos.index')->with('error', 'OcurriÃ³ un error al marcar la entrega: ' . $e->getMessage());
        }

        return redirect()->route('prestamos.index')->with('success', 'PrÃ©stamo marcado como entregado.');
    }
}
