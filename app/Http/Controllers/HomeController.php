<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $libros = Libro::paginate(2);

        if ($user->user_type == 'admin') {
            $libros = Libro::with('categoria')->paginate(5);
            $totalLibros = $libros->total();
            $libros_prestados = Libro::where('estatus', 1)->count();
            $total_usuarios = User::count();
            $devoluciones_pendientes = Prestamo::where('estado', 'pendiente')->count();


            return view("home.index", compact('libros', 'totalLibros', 'libros_prestados', 'total_usuarios', 'devoluciones_pendientes'));
        }

        return view("home.index_user", compact('libros'));
    }
}
