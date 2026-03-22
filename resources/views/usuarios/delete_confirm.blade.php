@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
<h1>Eliminar Usuario</h1>
    <p>¿Estás seguro de que deseas eliminar al usuario "{{ $usuario->name }}"?</p>

    <table class="min-w-full table-auto mb-4">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Nombre</th>
                <th class="px-4 py-2 border-b">Email</th>
                <th class="px-4 py-2 border-b">Tipo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2 border-b">{{ $usuario->id }}</td>
                <td class="px-4 py-2 border-b">{{ $usuario->name }}</td>
                <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                <td class="px-4 py-2 border-b">{{ $usuario->user_type }}</td>
            </tr>
        </tbody>
    </table>

        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
        </form>
</div>
@endsection