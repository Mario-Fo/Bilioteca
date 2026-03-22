@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
<h1 class="text-2xl font-bold mb-6">Lista de Usuarios</h1>
    <a href="{{ route('usuarios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Nuevo Usuario</a>
    <div class = "bg-white shadow-md rounded-lg p-6">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Tipo</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $usuario->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->user_type }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Editar</a>
                            <a href="{{ route('usuarios.delete_confirm', $usuario->id) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Eliminar</a>
                            <!--
                            <form action="" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Eliminar</button>
                            </form>
                            -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection