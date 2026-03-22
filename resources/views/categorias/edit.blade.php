@extends('layout.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-4">Editar Categoria</h1>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $categoria->nombre }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">Actualizar Categoria</button>
    </form>
    </div>
@endsection