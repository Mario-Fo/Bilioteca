<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Http\Resources\LibroResource;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credentials)) {
            $user = $request->user();
            $tokenName = $request->input('token_name', 'api-token');
            $token = $user->createToken($tokenName);
            return response($token->plainTextToken, 200)
                ->header('Content-Type', 'text/plain');
        }

        return response()->json([
            'ok' => false,
            'message' => 'datos incorrectos',
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()?->currentAccessToken()?->delete();

        return response()->json([
            'ok' => true,
            'message' => 'sesion cerrada',
        ], 200);
    }

    public function libros_disponibles()
    {
        $libros = Libro::where('estatus', 0)->orderBy('id', 'asc')->get();
        $libros_resource = LibroResource::collection($libros);
        return $libros_resource;
    }

    public function entregar_libro(Request $request)
    {
        $request->validate([
            'prestamo_id' => 'required|integer|exists:prestamos,id',
        ]);

        $id = $request->input('prestamo_id');

        \DB::beginTransaction();
        try{
            $prestamo = Prestamo::findOrFail($id);
            $prestamo->estado = 'entregado';
            $prestamo->fecha_entrega = now();
            $prestamo->save();

            $libro = Libro::findOrFail($prestamo->libro_id);
            $libro->estatus = 0; // Disponible
            $libro->save();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return ['error' => 'Error al entregar el libro: '];
        }
        return ['message' => 'Libro entregado exitosamente'];
    }
}