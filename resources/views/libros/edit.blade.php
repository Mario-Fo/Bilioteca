@extends('layout.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-4">Editar libro</h1>

    <form action="{{ route('libros.update', $libro->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $libro->nombre }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
        </div>
        <div>
                    <label for="isbn" class="mb-2 block text-sm font-medium text-slate-700">ISBN del libro</label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $libro->isbn) }}" required class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        placeholder="Ej. 978-84-9736-151-4">
                    @error('isbn')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
        </div>

        <div>
                    <label for="autor" class="mb-2 block text-sm font-medium text-slate-700">Autor del libro</label>
                    <input type="text" name="autor" id="autor" value="{{ old('autor', $libro->autor) }}" required class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        placeholder="Ej. Miguel de Cervantes">
                    @error('autor')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
        </div>           
                
        <div>
                    <label for="editorial" class="mb-2 block text-sm font-medium text-slate-700">Editorial del libro</label>
                    <input type="text" name="editorial" id="editorial" value="{{ old('editorial', $libro->editorial) }}" required class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        placeholder="Ej. Editorial Planeta">
                    @error('editorial')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
        </div>                

        <div>
                    <label for="categoria" class="mb-2 block text-sm font-medium text-slate-700">Categoría del libro</label>
                    <select name="categoria" class="mt-2 text-sm text-rose-600">
                        <option value=""></option>  
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach                  
                        </select>
        </div>        

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">Actualizar Libro</button>
    </form>
    </div>
@endsection