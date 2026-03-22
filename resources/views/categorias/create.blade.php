@extends('layout.admin')
@section('content')
    <section class="mx-auto w-full max-w-3xl">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Categorias / <span class="font-medium text-slate-700">Crear</span></p>
                <h1 class="mt-1 text-2xl font-semibold">Agregar categoria</h1>
            </div>
            <a href="{{ route('categorias.index') }}" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                Volver
            </a>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 custom-shadow">
            <form action="{{ route('categorias.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="nombre" class="mb-2 block text-sm font-medium text-slate-700">Nombre de la categoria</label>
                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        value="{{ old('nombre') }}"
                        required
                        class="block w-full rounded-xl border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        placeholder="Ej. Ciencia ficcion"
                    >
                    @error('nombre')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                        Guardar categoria
                    </button>
                    <a href="{{ route('categorias.index') }}" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
