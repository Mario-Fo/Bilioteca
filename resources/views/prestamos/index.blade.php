@extends('layout.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Prestamos</h1>

        @if(session('error'))
            <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="mb-4 rounded border border-green-200 bg-green-50 p-3 text-green-700">
                {{ session('success') }}
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
                        <th class="px-4 py-2 border-b">Fecha de Prestamo</th>
                        <th class="px-4 py-2 border-b">Fecha de Devolucion</th>
                        <th class="px-4 py-2 border-b">Estatus</th>
                        <th class="px-4 py-2 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestamos as $prestamo)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $prestamo->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->usuario->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->libro->nombre }}</td>
                            <td class="px-4 py-2 border-b">{{ $prestamo->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border-b">
                                {{ $prestamo->fecha_entrega ? \Carbon\Carbon::parse($prestamo->fecha_entrega)->format('Y-m-d H:i') : '-' }}
                            </td>
                            <td class="px-4 py-2 border-b">{{ ucfirst($prestamo->estado ?? 'pendiente') }}</td>
                            <td class="px-4 py-2 border-b">
                                @if(($prestamo->estado ?? 'pendiente') === 'pendiente')
                                    <form action="{{ route('prestamos.entregar', $prestamo->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                            Entregar
                                        </button>
                                    </form>
                                @else
                                    <span class="text-sm text-gray-600">Entregado</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
