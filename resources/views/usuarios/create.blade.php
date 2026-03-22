@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Crear Nuevo Usuario</h1>

    <form action="{{ route('usuarios.store') }}" method="POST" class = "bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-slate-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value = "{{ old('nombre') }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" id="email" name="email" value = "{{ old('email') }}" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-slate-700">Contraseña</label>
                <input type="password" id="password" name="password"  class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation"  class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="user_type" class="block text-sm font-medium text-slate-700">Tipo de Usuario</label>
                <select id="user_type" name="user_type" class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Selecciona un tipo de usuario</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Usuario</button>
            </div>
            <div class="mt-4">
                <a href="{{ route('usuarios.index') }}" class="text-blue-500 hover:text-blue-700">Volver a la lista de usuarios</a>
            </div>

        </div>
    </form>
</div>
@endsection