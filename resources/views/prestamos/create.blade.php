@extends('layout.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Crear Prestamo</h1>
        
        <div class="bg-white shadow-md rounded-lg p-6 mt-4">
                @if ($errors->any())
                    <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('prestamos.buscar_usuario') }}" method="POST">
                    @csrf
                    <label for="usuario_id" class="block text-gray-700 font-bold mb-2">ID del Usuario:</label>
                    <input type="text" name="usuario_id" value="{{ old('usuario_id') }}" placeholder="ID del Usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <label for="usuario_nombre" class="block text-gray-700 font-bold mb-2">Nombre del Usuario:</label>
                    <input type="text" name="usuario_nombre" value="{{ old('usuario_nombre') }}" placeholder="Nombre del Usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                 
                    <div class="flex items-center justify between">
                        <input type="submit" value="Buscar Usuario" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <a href="{{ route('prestamos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
                    </div>
                </form>

                @isset($usuario)
                    <div class="mt-6">
                        <h2 class="text-xl font-bold mb-2">Usuario Encontrado:</h2>
                        <p><strong>ID:</strong> {{ $usuario->id }}</p>
                        <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                        <p><strong>Email:</strong> {{ $usuario->email }}</p>
                    </div>

                    <form action="{{ route('prestamos.select_libro') }}" method="POST">
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                        <input type="submit" value="Seleccionar Libro" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    </form>
                @endisset
        </div>
    </div>

@endsection
