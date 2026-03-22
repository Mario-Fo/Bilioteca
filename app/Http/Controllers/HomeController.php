<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Libro;

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
            return view("home.index", compact('libros'));
        }

        return view("home.index_user", compact('libros'));
    }
}
