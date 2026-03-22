@extends('layout.admin')
@section('title', 'Categorias')
@section('content')
    <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-semibold">Categorias</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('categorias.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">Agregar Categoria</a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white">
        <table class="min-w-full">
            <thead class="bg-slate-100 text-slate-700">
                <tr>
                    <th class="px-4 py-3 text-left border-b border-slate-200 w-24">ID</th>
                    <th class="px-4 py-3 text-left border-b border-slate-200">Nombre</th>
                    <th class="px-4 py-3 text-left border-b border-slate-200 w-200">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 border-b">{{ $categoria->id }}</td>
                        <td class="px-4 py-3 border-b">{{ $categoria->nombre }}</td>
                        <td class="px-4 py-3 border-b">
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('¿Estás seguro de eliminar esta categoria?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-6 text-center text-slate-500">No hay categorias registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
         <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-end">
          {{ $categorias->links()}}
          </div>
    </div>
@endsection
