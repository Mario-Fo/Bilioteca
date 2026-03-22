@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class = "bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-slate-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value = "{{ old('nombre', $usuario->name) }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" id="email" name="email" value = "{{ old('email', $usuario->email) }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="user_type" class="block text-sm font-medium text-slate-700">Tipo de Usuario</label>
                <select id="user_type" name="user_type" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Selecciona un tipo de usuario</option>
                    <option value="admin" {{ old('user_type', $usuario->user_type) == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="user" {{ old('user_type', $usuario->user_type) == 'user' ? 'selected' : '' }}>Usuario</option>
                </select>
            </div>
            <div class="">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualiza Usuario</button>
            
                <a href="{{ route('usuarios.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Volver a la lista de usuarios</a>
            </div>

        </div>
    </form>
</div>
@endsection