@extends('layout.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Prestamos</h1>

        @if(session('error'))
            <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{ route('prestamos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Prestamo</a>

        <div class="bg-white shadow-md rounded-lg p-6 mt-4">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">ID</th>
                        <th class="px-4 py-2 border-b">Usuario</th>
                        <th class="px-4 py-2 border-b">Libro</th>
                        <th class="px-4 py-2 border-b">Fecha de Préstamo</th>
                        <th class="px-4 py-2 border-b">Fecha de Devolución</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestamos as $prestamo)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $prestamo->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->usuario->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->libro->nombre }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->fecha_devolucion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection