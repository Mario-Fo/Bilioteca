@extends('layout.admin')

@section('content')

<section class="mx-auto w-full max-w-3xl">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Libro / <span class="font-medium text-slate-700">Crear</span></p>
                <h1 class="mt-1 text-2xl font-semibold">Agregar Libro</h1>
            </div>
            <a href="{{ route('categorias.index') }}" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                Volver
            </a>
        </div>

         <div class="rounded-2xl border border-slate-200 bg-white p-6 custom-shadow">
            <form action="{{ route('libros.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="nombre" class="mb-2 block text-sm font-medium text-slate-700">Nombre del libro</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        placeholder="Ej. Don Quijote de la Mancha">
                    @error('nombre')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="isbn" class="mb-2 block text-sm font-medium text-slate-700">ISBN del libro</label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" required class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        placeholder="Ej. 978-84-9736-151-4">
                    @error('isbn')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="autor" class="mb-2 block text-sm font-medium text-slate-700">Autor del libro</label>
                    <input type="text" name="autor" id="autor" value="{{ old('autor') }}" required class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        placeholder="Ej. Miguel de Cervantes">
                    @error('autor')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>           
                
                <div>
                    <label for="editorial" class="mb-2 block text-sm font-medium text-slate-700">Editorial del libro</label>
                    <input type="text" name="editorial" id="editorial" value="{{ old('editorial') }}" required class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
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
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach                  
                        </select>
                </div>                

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                        Guardar libro
                    </button>
                    <a href="{{ route('home') }}" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </section>

@endsection