@extends('layout.admin')
@section('content')

<div class="container mx-auto px-4 py-8">

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Éxito! </strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Error! </strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <h1 class="text-2xl font-bold mb-4">Perfil de Usuario</h1>

    <form action="{{ route('usuarios.update_profile') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('nombre')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
    </form>
    <form action="{{ route('usuarios.update_password') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-slate-700">Contraseña Actual</label>
                <input type="password" id="current_password" name="current_password"  class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('current_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-slate-700">Nueva Contraseña</label>
                <input type="password" id="new_password" name="new_password"  class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('new_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-sm font-medium text-slate-700">Confirmar Nueva Contraseña</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation"  class="mt-1 block w-full border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @error('new_password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Guardar
            </button>
        </div>
    </form>
</div>

        
@endsection