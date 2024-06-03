@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
   <div class="bg-white shadow rounded-lg p-6">
       <h1 class="text-2xl font-bold mb-4">Categorías</h1>

       <!-- Botón de Nueva Categoría -->
       <div class="mb-6">
           <a href="{{ route('categorias.create') }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">Nueva Categoría</a>
       </div>

       <!-- Lista de Categorías -->
       <ul class="list-disc pl-5 space-y-2">
           @foreach($categorias as $categoria)
               <li class="flex justify-between items-center bg-gray-100 px-4 py-2 rounded-lg">
                   <span>
                       <a href="{{ route('categorias.edit', $categoria) }}" class="text-blue-500 hover:underline">{{ $categoria->nombre }}</a>
                   </span>
                   <div class="flex space-x-2">
                       <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Eliminar</button>
                       </form>
                   </div>
               </li>
           @endforeach
       </ul>
   </div>
</div>
@endsection
